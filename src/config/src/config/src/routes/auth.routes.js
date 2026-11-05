const express = require('express');
const router = express.Router();
const authController = require('../controllers/auth.controller');

/**
 * @swagger
 * /api/v1/auth/login:
 *   post:
 *   summary: Authenticate user and get JWT token
 *   tags: [Auth]
 *   requestBody:
 *     required: true
 *     content:
 *       application/json:
 *         schema:
 *           type: object
 *           required:
 *             - email
 *             - password
 *           properties:
 *             email:
 *               type: string
 *               example: client@example.com
 *             password:
 *               type: string
 *               example: securepassword123
 *   responses:
 *     200:
 *       description: Login successful, returns JWT token
 *     401:
 *       description: Invalid credentials
 */
router.post('/login', authController.login);

router.post('/register', authController.register);

module.exports = router;