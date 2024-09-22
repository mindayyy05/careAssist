describe('Login Test', () => {
    it('should redirect to home page after successful login', () => {
      
      cy.visit('http://localhost:8000/login');
  
      
      cy.get('input[name="email"]').type('thinara@gmail.com');
      cy.get('input[name="password"]').type('thinara12345');
  
      
      cy.get('.login-button').click();

  
      
      cy.url({ timeout: 10000 }).should('eq', 'http://localhost:8000/dashboard');
  
      
    });
  });



  