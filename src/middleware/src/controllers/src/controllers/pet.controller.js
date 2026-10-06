const prisma = require('../config/db');

exports.createPet = async (req, res) => {
  const { name, breed, species, size, temperamentNotes, vaccinationDone } = req.body;

  try {
    const pet = await prisma.pet.create({
      data: {
        ownerId: req.user.id,
        name,
        breed,
        species,
        size,
        temperamentNotes,
        vaccinationDone
      }
    });

    res.status(201).json(pet);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};

exports.getUserPets = async (req, res) => {
  try {
    const pets = await prisma.pet.findMany({
      where: { ownerId: req.user.id }
    });
    res.json(pets);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
};
