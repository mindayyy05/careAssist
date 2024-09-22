describe('Navigation Tests', () => {
  it('should navigate from Who Are You page to Register page when Customer button is clicked', () => {
    // Visit the 'Who Are You' page
    cy.visit('http://localhost:8000/who-are-you');

    // Click the 'Customer' button
    cy.get('a.button.customer').click();

    // Verify that the URL is now the 'Register' page
    cy.url().should('eq', 'http://localhost:8000/register');
  });
});

describe('Navigation Tests', () => {
  it('should navigate to login page when "Already registered?" link is clicked', () => {
    // Visit the registration page
    cy.visit('http://localhost:8000/register');

    // Click the "Already registered?" link
    cy.contains('Already registered?').click();

    // Assert that the URL is now the login page
    cy.url().should('eq', 'http://localhost:8000/login');
  });
});




