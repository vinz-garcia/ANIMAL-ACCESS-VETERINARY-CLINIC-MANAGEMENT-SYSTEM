const swaggerJSDoc = require('swagger-jsdoc');

const options = {
  definition: {
    openapi: '3.0.0',
    info: {
      title: 'Pet Grooming Appointment & Management System API',
      version: '1.0.0',
      description: 'API documentation for managing clients, pets, services, and grooming appointments.',
    },
    servers: [
      {
        url: 'http://localhost:5000',
        description: 'Development Server',
      },
    ],
    components: {
      securitySchemes: {
        BearerAuth: {
          type: 'http',
          scheme: 'bearer',
          bearerFormat: 'JWT',
        },
      },
    },
  },
  apis: ['./src/routes/*.js', './src/controllers/*.js'], // Files containing annotations
};

const swaggerSpec = swaggerJSDoc(options);
module.exports = swaggerSpec;