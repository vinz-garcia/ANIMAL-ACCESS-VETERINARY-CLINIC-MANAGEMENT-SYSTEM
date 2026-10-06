const express = require('express');
const router = express.Router();
const petController = require('../controllers/pet.controller');
const { authenticateToken } = require('../middleware/auth');

router.use(authenticateToken);
router.post('/', petController.createPet);
router.get('/', petController.getUserPets);

module.exports = router;
