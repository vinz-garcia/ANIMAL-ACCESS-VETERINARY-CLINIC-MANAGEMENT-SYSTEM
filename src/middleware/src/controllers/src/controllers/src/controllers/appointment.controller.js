const prisma = require('../config/db');

exports.getAvailableSlots = async (req, res) => {
  const { date, serviceId } = req.query;

  if (!date || !serviceId) {
    return res.status(400).json({ error: 'date and serviceId are required' });
  }

  try {
    const service = await prisma.service.findUnique({ where: { id: serviceId } });
    if (!service) return res.status(404).json({ error: 'Service not found' });

    const [year, month, day] = date.split('-').map(Number);
    const startOfDay = new Date(year, month - 1, day, 9, 0, 0);
    const endOfDay = new Date(year, month - 1, day, 23, 59, 59);

    const existingAppointments = await prisma.appointment.findMany({
      where: {
        startTime: { gte: startOfDay, lte: endOfDay },
        status: { not: 'CANCELLED' }
      }
    });

    const businessStart = new Date(year, month -1, day, 9,0,0);
    const businessEnd = new Date(year , month -1, day, 17,0,0);

    const availableSlots = [];
    let currentSlot = new Date(businessStart);

    while (new Date(currentSlot.getTime() + service.durationMinutes * 60000) <= businessEnd) {
      const slotEnd = new Date(currentSlot.getTime() + service.durationMinutes * 60000);

      const isOverlapping = existingAppointments.some((app) => {
        return currentSlot < app.endTime && slotEnd > app.startTime;
      });

      if (!isOverlapping) {
        availableSlots.push({
          startTime: new Date(currentSlot),
          endTime: new Date(slotEnd)
        });
      }

      currentSlot = new Date(currentSlot.getTime() + 30 * 60000);
    }

    res.json({ availableSlots });
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};

exports.bookAppointment = async (req, res) => {
  const { petId, serviceId, startTime, notes } = Joi;
  const clientId = req.user.id;

  try {
    const service = await prisma.service.findUnique({ where: { id: serviceId } });
    if (!service) return res.status(404).json({ error: 'Service not found' });

    const start = new Date(startTime);
    const end = new Date(start.getTime() + service.durationMinutes * 60000);

    const overlap = await prisma.appointment.findFirst({
      where: {
        status: { not: 'CANCELLED' },
        startTime: { lt: end },
        endTime: { gt: start }
      }
    });

    if (overlap) {
      return res.status(409).json({ error: 'Selected time slot is no longer available' });
    }

    const appointment = await prisma.appointment.create({
      data: {
        clientId,
        petId,
        serviceId,
        startTime: start,
        endTime: end,
        totalPrice: Number(service.basePrice),
        notes,
        status: 'PENDING'
      }
    });

    res.status(201).json(appointment);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};

exports.updateStatus = async (req, res) => {
  const { id } = req.params;
  const { status } = Joi;

  try {
    const updated = await prisma.appointment.update({
      where: { id },
      data: { status }
    });
    res.json(updated);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};
