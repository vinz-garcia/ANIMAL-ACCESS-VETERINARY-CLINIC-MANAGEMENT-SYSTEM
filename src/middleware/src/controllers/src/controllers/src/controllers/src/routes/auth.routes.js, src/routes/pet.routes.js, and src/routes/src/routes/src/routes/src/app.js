const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const rateLimit = require('express-rate-limit');
const xss = require('xss');

const authRoutes = require('./routes/auth.routes');
const petRoutes = require('./routes/pet.routes');
const appointmentRoutes = require('./routes/appointment.routes');

const app = express();

// --- 1. SECURITY ENHANCEMENTS ---

// Set security-related HTTP headers
app.use(helmet());

// Enable CORS
app.use(cors());

// Parse JSON bodies
app.use(express.json());

// Rate Limiter: Prevent brute-force attacks on login/auth routes
const authLimiter = rateLimit({
  windowMs: 15 * 60 * 1000, // 15 minutes
  max: 10, // Limit each IP to 10 requests per windowMs on auth routes
  message: { error: 'Too many login attempts from this IP, please try again after 15 minutes' }
});
app.use('/api/v1/auth/login', authLimiter);

// XSS Sanitization Middleware: Clean incoming user input to prevent script injection
app.use((req, res, next) => {
  if (req.body) {
    for (let key of Object.keys(req.body)) {
      if (typeof req.body[key] === 'string') {
        req.body[key] = xss(req.body[key]);
      }
    }
  }
  next();
});

// --- 2. API ROUTES ---
app.use('/api/v1/auth', authRoutes);
app.use('/api/v1/pets', petRoutes);
app.use('/api/v1/appointments', appointmentRoutes);

const swaggerUi = require('swagger-ui-express');
const swaggerSpec = require('./config/swagger');

// Swagger UI Route
app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerSpec));

module.exports = app;