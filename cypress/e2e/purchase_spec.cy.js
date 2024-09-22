// cypress/e2e/purchase_spec.cy.js
Cypress.on('uncaught:exception', (err, runnable) => {
    return false;
  });

  
describe('Purchase Page Navigation', () => {

    // Before each test, ensure the user is logged in and navigate to the dashboard
    beforeEach(() => {
        cy.visit('http://localhost:8000/login');

        // Perform login
        cy.get('input[name="email"]').type('thinara@gmail.com');
        cy.get('input[name="password"]').type('thinara12345');
        cy.get('button[type="submit"]').click();

        // Ensure the login was successful and the user is redirected to the dashboard
        cy.url().should('eq', 'http://localhost:8000/dashboard');  
    });

    it('should direct to the purchase page (choosing page ) when the "Purchase Health Products" card is clicked', () => {
        // Find and click the "Purchase Health Products" card
        cy.get('.our-services-container .cards .card')
            .contains('Purchase Health Products')
            .click();

        // Assert that the URL is correct
        cy.url().should('eq', 'http://localhost:8000/purchase-choose');
    });


    it('should direct to the Baby Products page when the "Baby Products" card is clicked', () => {
        // Visit the purchase choosing page
        cy.visit('http://localhost:8000/purchase-choose');

        // Find and click the "Baby Products" card
        cy.contains('.category-card', 'Baby Products').click();

        // Assert that the URL is correct
        cy.url().should('eq', 'http://localhost:8000/babyproducts');
    });

    // cypress/e2e/add_to_cart_spec.js

describe('Add to Cart Popup Test', () => {
    beforeEach(() => {
      // Visit the page containing the products
      cy.visit('http://localhost:8000/babyproducts');
    });
  
    it('should show the cart popup when "Add to cart" button is clicked', () => {
      // Click the "Add to cart" button for the first product
      cy.get('.product-card').first().find('button').click();
  
      // Assert that the cart-popup is visible
      cy.get('.popup-content').should('be.visible');
  
      // Optionally, assert the content inside the popup
      //cy.get('.popup-content').should('contain.text', 'Product added to cart');
    });
  });
  
  describe('Add to Cart with Quantity Test', () => {
    beforeEach(() => {
        // Visit the page containing the products
        cy.visit('http://localhost:8000/babyproducts');
    });

    it('should redirect to the baby products page after adding a quantity and clicking "Add to Cart"', () => {
        // Click the "Add to cart" button for the first product to open the cart popup
        cy.get('.product-card').first().find('button').click();
        
        // Ensure the cart popup is visible
        cy.get('#cart-popup').should('be.visible');
        
        // Enter quantity (assuming there is an input field for quantity)
        cy.get('#quantity').clear().type('2');

        // Click the "Add to Cart" button in the popup
        cy.get('#submit-button').click();

        // Assert that the URL is redirected to the baby products page
        cy.url().should('eq', 'http://localhost:8000/babyproducts');
    });

    
});

describe('Cart Navigation Test', () => {
    beforeEach(() => {
        // Visit the page containing the navigation
        cy.visit('http://localhost:8000/babyproducts');
    });

    it('should direct to the shopping cart page when "Cart" link is clicked', () => {
        // Click the "Cart" link in the navigation
        cy.get('nav').find('a').contains('Cart').click();

        // Assert that the URL is redirected to the shopping cart page
        cy.url().should('eq', 'http://localhost:8000/shopping-cart');
    });
});

describe('Checkout Navigation Test', () => {
    beforeEach(() => {
        // Visit the shopping cart page
        cy.visit('http://localhost:8000/shopping-cart');
    });

    it('should direct to the checkout page when "Proceed to Checkout" button is clicked', () => {
        // Click the "Proceed to Checkout" button inside the summary card
        cy.get('.summary-card').find('a.btn').click();

        // Assert that the URL is redirected to the checkout page
        cy.url().should('eq', 'http://localhost:8000/checkout');
    });
});

describe('Order Confirmation Navigation Test', () => {
    beforeEach(() => {
        // Visit the checkout page
        cy.visit('http://localhost:8000/checkout');
    });

    it('should direct to the order details page when "Confirm Order" button is clicked', () => {
        // Click the "Confirm Order" button inside the container
        cy.get('.container').find('button#confirm').click();

        // Assert that the URL is redirected to the order details page
        cy.url().should('include', '/orderdetails');
    });
});

describe('Checkout Form', () => {
    it('submits the form and redirects to order success page', () => {
      // Visit the checkout page
      cy.visit('http://localhost:8000/orderdetails?'); // Adjust the URL if needed
  
      // Fill out the form
      cy.get('#name').type('John Doe');
      cy.get('#phone').type('1234567890');
      cy.get('#city').type('Test City');
      cy.get('#street').type('Test Street');
      cy.get('#house_number').type('123');
      cy.get('#card_type').select('Visa');
      cy.get('#card_number').type('4111111111111111');
      cy.get('#expiry_date').type('12/23');
      cy.get('#cvv').type('123');
  
      // Submit the form
      cy.get('#checkout-form').submit();
  
      // Check that the user is redirected to the order success page
      cy.url().should('eq', 'http://localhost:8000/order-success');
  
      
    });

    
  });

  describe('Checkout Form', () => {
    it('error message when invalid expiry month format is input', () => {
      // Visit the checkout page
      cy.visit('http://localhost:8000/orderdetails?'); // Adjust the URL if needed
  
      // Fill out the form
      cy.get('#name').type('John Doe');
      cy.get('#phone').type('1234567890');
      cy.get('#city').type('Test City');
      cy.get('#street').type('Test Street');
      cy.get('#house_number').type('123');
      cy.get('#card_type').select('Visa');
      cy.get('#card_number').type('4111111111111111');
      cy.get('#expiry_date').type('12');
      cy.get('#cvv').type('123');
  
      // Submit the form
      cy.get('#checkout-form').submit();
  
      // Check that the user is redirected to the order success page
      cy.get('#expiry_date-error') // Replace with the actual selector for the error message container
            .should('be.visible')
            .and('contain', 'Expiry date must be in MM/YY format.');
  
    
    });

    it('error message when invalid cvv format is input', () => {
        // Visit the checkout page
        cy.visit('http://localhost:8000/orderdetails?'); // Adjust the URL if needed
    
        // Fill out the form
        cy.get('#name').type('John Doe');
        cy.get('#phone').type('1234567890');
        cy.get('#city').type('Test City');
        cy.get('#street').type('Test Street');
        cy.get('#house_number').type('123');
        cy.get('#card_type').select('Visa');
        cy.get('#card_number').type('4111111111111111');
        cy.get('#expiry_date').type('12/12');
        cy.get('#cvv').type('12');
    
        // Submit the form
        cy.get('#checkout-form').submit();
    
        // Check that the user is redirected to the order success page
        cy.get('#cvv-error') // Replace with the actual selector for the error message container
              .should('be.visible')
              .and('contain', 'CVV must be 3 digits.');
    
      
      });

      it('error message when invalid cvv format is input', () => {
        // Visit the checkout page
        cy.visit('http://localhost:8000/orderdetails?'); // Adjust the URL if needed
    
        // Fill out the form
        cy.get('#name').type('John Doe');
        cy.get('#phone').type('1234567890');
        cy.get('#city').type('Test City');
        cy.get('#street').type('Test Street');
        cy.get('#house_number').type('123');
        cy.get('#card_type').select('Visa');
        cy.get('#card_number').type('4111111111111111');
        cy.get('#expiry_date').type('12/12');
        cy.get('#cvv').type('12');
    
        // Submit the form
        cy.get('#checkout-form').submit();
    
        // Check that the user is redirected to the order success page
        cy.get('#cvv-error') // Replace with the actual selector for the error message container
              .should('be.visible')
              .and('contain', 'CVV must be 3 digits.');
    
      
      });


      it('error message when invalid phone number format is input', () => {
        // Visit the checkout page
        cy.visit('http://localhost:8000/orderdetails?'); // Adjust the URL if needed
    
        // Fill out the form
        cy.get('#name').type('John Doe');
        cy.get('#phone').type('123456789');
        cy.get('#city').type('Test City');
        cy.get('#street').type('Test Street');
        cy.get('#house_number').type('123');
        cy.get('#card_type').select('Visa');
        cy.get('#card_number').type('4111111111111111');
        cy.get('#expiry_date').type('12/12');
        cy.get('#cvv').type('123');
    
        // Submit the form
        cy.get('#checkout-form').submit();
    
        // Check that the user is redirected to the order success page
        cy.get('#phone-error') // Replace with the actual selector for the error message container
              .should('be.visible')
              .and('contain', 'Phone number must be 10 digits.');
    
      
      });

      it('error message when trying to submit without filling all fields', () => {
        // Visit the checkout page
        cy.visit('http://localhost:8000/orderdetails?'); // Adjust the URL if needed
    
        // Fill out the form
        cy.get('#name').type('John Doe');
        cy.get('#phone').type('1234567890');
        cy.get('#city').type('Test City');
        //cy.get('#street').type('Test Street');
        cy.get('#house_number').type('123');
        cy.get('#card_type').select('Visa');
        cy.get('#card_number').type('4111111111111111');
        cy.get('#expiry_date').type('12/12');
        cy.get('#cvv').type('123');
    
        // Submit the form
        cy.get('#checkout-form').submit();
    
        // Check that the user is redirected to the order success page
        cy.get('#street-error') // Replace with the actual selector for the error message container
              .should('be.visible')
              .and('contain', 'Street is required.');
    
      
      });

  
});



});
