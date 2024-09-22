describe('Babysitter Form Validations', () => {
    it('Shows error when numbers are entered in the kid_names field', () => {
      // Visit the babysitter profile page
      cy.visit('http://localhost:8000/babysitterprofile');
  
      // Select a date (assuming the calendar is interactive and you can pick dates)
      // This will depend on how your calendar is structured; adjust the selector accordingly
      cy.get('.calendar').first().click(); 
  
      // Fill in the form with invalid data for kid_names
      cy.get('input[name="kid_names"]').type('1234');
  
      // Fill in the other fields
      //cy.get('#number_of_kids').type('5');
      cy.get('#allergies').type('nuts');
      cy.get('#disabilities').type('cant walk');
      cy.get('#timing_start').type('08:00');
      cy.get('#timing_end').type('17:00');
      cy.get('#your_name').type('John Doe');
      cy.get('#phone_number').type('1234567890');
      cy.get('#house_address').type('123 Main St');
  
      // Submit the form using the correct submit button
      cy.get('button.submitform').click();
  
      // Check that the error message is displayed
      cy.get('.error').within(() => {
        cy.contains('The kid names field format is invalid').should('be.visible');
      });
    });


    it('Shows error when numbers are entered in the allergies', () => {
        // Visit the babysitter profile page
        cy.visit('http://localhost:8000/babysitterprofile');
    
        // Select a date (assuming the calendar is interactive and you can pick dates)
        // This will depend on how your calendar is structured; adjust the selector accordingly
        cy.get('.calendar').first().click(); // This selects the first available date; adjust as needed
    
        // Fill in the form with invalid data for kid_names
        
        cy.get('input[name="allergies"]').type('1234');
    
        // Fill in the other fields
        //cy.get('#number_of_kids').type('5');
        cy.get('#kid_names').type('ella');
        cy.get('#disabilities').type('cant walk');
        cy.get('#timing_start').type('08:00');
        cy.get('#timing_end').type('17:00');
        cy.get('#your_name').type('John Doe');
        cy.get('#phone_number').type('1234567890');
        cy.get('#house_address').type('123 Main St');
    
        // Submit the form using the correct submit button
        cy.get('button.submitform').click();
    
        // Check that the error message is displayed
        cy.get('.error').within(() => {
          cy.contains('The allergies field format is invalid').should('be.visible');
        });
      });

      it('Shows error when numbers are entered in the disabilities', () => {
        // Visit the babysitter profile page
        cy.visit('http://localhost:8000/babysitterprofile');
    
        // Select a date (assuming the calendar is interactive and you can pick dates)
        // This will depend on how your calendar is structured; adjust the selector accordingly
        cy.get('.calendar').first().click(); // This selects the first available date; adjust as needed
    
        // Fill in the form with invalid data for kid_names
        
        cy.get('input[name="disabilities"]').type('1234');
    
        // Fill in the other fields
        //cy.get('#number_of_kids').type('5');
        cy.get('#kid_names').type('ella');
        cy.get('#allergies').type('nuts');
        cy.get('#timing_start').type('08:00');
        cy.get('#timing_end').type('17:00');
        cy.get('#your_name').type('John Doe');
        cy.get('#phone_number').type('1234567890');
        cy.get('#house_address').type('123 Main St');
    
        // Submit the form using the correct submit button
        cy.get('button.submitform').click();
    
        // Check that the error message is displayed
        cy.get('.error').within(() => {
          cy.contains('The disabilities field format is invalid').should('be.visible');
        });
      });


      it('Shows error when numbers are entered in your name', () => {
        // Visit the babysitter profile page
        cy.visit('http://localhost:8000/babysitterprofile');
    
        // Select a date (assuming the calendar is interactive and you can pick dates)
        // This will depend on how your calendar is structured; adjust the selector accordingly
        cy.get('.calendar').first().click(); // This selects the first available date; adjust as needed
    
        // Fill in the form with invalid data for kid_names
        
        cy.get('input[name="your_name"]').type('1234');
    
        // Fill in the other fields
        //cy.get('#number_of_kids').type('5');
        cy.get('#kid_names').type('ella');
        cy.get('#allergies').type('nuts');
        cy.get('#timing_start').type('08:00');
        cy.get('#timing_end').type('17:00');
        cy.get('#disabilities').type('no talking');
        cy.get('#phone_number').type('1234567890');
        cy.get('#house_address').type('123 Main St');
    
        // Submit the form using the correct submit button
        cy.get('button.submitform').click();
    
        // Check that the error message is displayed
        cy.get('.error').within(() => {
          cy.contains('The your name field format is invalid').should('be.visible');
        });
      });



      it('Shows error when letters are entered in phone number field', () => {
        // Visit the babysitter profile page
        cy.visit('http://localhost:8000/babysitterprofile');
    
        // Select a date (assuming the calendar is interactive and you can pick dates)
        // This will depend on how your calendar is structured; adjust the selector accordingly
        cy.get('.calendar').first().click(); // This selects the first available date; adjust as needed
    
        // Fill in the form with invalid data for kid_names
        
        cy.get('input[name="phone_number"]').type('trew');
    
        // Fill in the other fields
        //cy.get('#number_of_kids').type('5');
        cy.get('#kid_names').type('ella');
        cy.get('#allergies').type('nuts');
        cy.get('#timing_start').type('08:00');
        cy.get('#timing_end').type('17:00');
        cy.get('#disabilities').type('no talking');
        cy.get('#your_name').type('mindi');
        cy.get('#house_address').type('123 Main St');
    
        // Submit the form using the correct submit button
        cy.get('button.submitform').click();
    
        // Check that the error message is displayed
        cy.get('.error').within(() => {
          cy.contains('The phone number field must be a number').should('be.visible');
        });
      });
  });
  