const express = require('express');
const router = express.Router();
const appointmentController = require('../controllers/appointment.controller');
const { authenticateToken, authorizeRoles } = require('../middleware/auth');

router.get('/available-slots', appointmentController.getAvailableSlots);
router.post('/', authenticateToken, appointmentController.bookAppointment);
router.patch(
  '/:id/status', 
  authenticateToken, 
  authorizeRoles('ADMIN', 'STAFF'), 
  appointmentController.updateStatus
);

module.exports = router;
