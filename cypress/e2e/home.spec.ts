describe("Test the Home screen UI Components",()=>{
    beforeEach(() => {
        cy.visit("/");
        // fill in username
        cy.get('#inputEmail')
         .should("be.visible")
         .type(Cypress.env("username"));

        // fill in password
         cy.get('#inputPassword')
         .should("be.visible")
         .type(Cypress.env("password"));

         // click login button (warning: should have specific id or test attribute)
         cy.get('.btn').should("be.visible").click();
    });

    it("should verify the ui components of the home screen",()=>{
        // Text "Clinick Web"
        cy.get('.navbar-brand').should("contain.text","Clinick Web");

        cy.get(':nth-child(1) > .nav-link')
         .should("contain.text", "Home ")
         .should("have.attr","href", "/");


         cy.get(':nth-child(2) > .nav-link')
         .should("contain.text", "Create Patient")
         .should("have.attr","href", "/create-patient");

         cy.get(".form-control")
          .should("be.visible")
          .should("have.attr","placeholder","Search");


    });
})
