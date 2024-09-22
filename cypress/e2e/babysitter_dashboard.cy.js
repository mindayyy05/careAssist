
Cypress.on('uncaught:exception', (err, runnable) => {
    return false;
  });
  describe('Babysitter Dashboard', () => {
    beforeEach(() => {
      // Visit the "Who Are You" page before each test
      cy.visit('http://localhost:8000/who-are-you');
    });
  
    it('should redirect to the babysitter login page when "Babysitter Agency" is selected and "Sign Up" is clicked', () => {
      // Step 1: Click on the "Service Providing Agency" button to show the options
      cy.contains('Service Providing Agency').click();
  
      // Step 2: Select "Babysitter Agency" from the dropdown
      cy.get('#agency-type').select('babysitter');
  
      // Step 3: Click on the "Sign Up" button
      cy.get('button').contains('Sign Up').click();
  
      // Step 4: Verify that the user is redirected to the babysitter login page
      cy.url().should('include', '/babysitter/login');
    });

    it('should log in with correct credentials and redirect to the babysitter dashboard', () => {
        // Visit the Babysitter Login page directly
        cy.visit('http://localhost:8000/babysitter/login');
    
        // Step 1: Fill in the login form with correct credentials
        cy.get('#email').type('julia@gmail.com');
        cy.get('#password').type('julia12345');
    
        // Step 2: Click the "Login" button
        cy.get('button').contains('Login').click();
    
        // Step 3: Verify that the user is redirected to the babysitter dashboard
        cy.url().should('include', '/babysitter/dashboard');
      });

      describe('Babysitter Dashboard - client cards', () => {
        beforeEach(() => {
          // Visit the Babysitter Dashboard before each test
          cy.visit('http://localhost:8000/babysitter/dashboard');
        });
      
        it('details pop up appears when pressing the view details button', () => {
            // Step 1: Click the "View Details" button for the first booking
            cy.get('.view-details').first().click();
        
            // Step 2: Verify that the corresponding modal is visible
            cy.get('.modal').first().should('be.visible');
        
            
        
            
          });

          it('should accept the booking and redirect back to the dashboard', () => {
            // Step 1: Click the "View Details" button for the first booking to open the modal
            cy.get('.view-details').first().click();
        
            // Step 2: Find the modal that opened and ensure it is visible
            cy.get('.modal').first().should('be.visible');
        
            // Step 3: Click the "Accept" button within the modal
            cy.get('.accept-btn').first().click();
        
            // Step 4: Verify that the user is redirected back to the dashboard
            cy.url().should('eq', 'http://localhost:8000/babysitter/dashboard');
        

          
            
          });

           it('should decline the booking and redirect back to the dashboard', () => {
            // Step 1: Click the "View Details" button for the first booking to open the modal
            cy.get('.view-details').first().click();
        
            // Step 2: Find the modal that opened and ensure it is visible
            cy.get('.modal').first().should('be.visible');
        
            // Step 3: Click the "Accept" button within the modal
            cy.get('.decline-btn').first().click();
        
            // Step 4: Verify that the user is redirected back to the dashboard
            cy.url().should('eq', 'http://localhost:8000/babysitter/dashboard');
        
      });

      it('to-do list pop up appears when pressing the view todo list button', () => {
        // Step 1: Click the "View Details" button for the first booking
        cy.get('.view-todo-list').first().click();
    
        // Step 2: Verify that the corresponding modal is visible
        cy.get('.todo-popup').first().should('be.visible');
    
        
    
        
      });

      it('should update the to-do status to "done" when the Done button is clicked', () => {
        // Step 1: Visit the dashboard page
        cy.visit('http://localhost:8000/babysitter/dashboard');

        cy.get('.view-todo-list').first().click();
        
        // Step 2: Ensure the to-do list popup is visible
        cy.get('.todo-popup', { timeout: 10000 }).should('be.visible');
        
        // Step 3: Click the "Done" button
        // Assuming you have a unique way to identify which "Done" button to click. 
        // Here we select the first "Done" button as an example.
        cy.get('.todo-popup .done-btn').first().click();
        
        // Step 4: Verify the status update
        // Here we are assuming that the span ID has the correct ID for the first to-do item
        // Replace `{{ $todo->id }}` with the actual ID or make sure it is dynamically correct
        cy.get('.todo-popup').first().should('be.visible');
    });
    
        
      });
      });
      

  