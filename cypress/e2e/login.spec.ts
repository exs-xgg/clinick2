
context("Login Page", () =>{
    beforeEach(() => {
        cy.visit("/");
    });
    // Can be component test
    it("verifies login screen elements",()=>{
        // Text "Clinick Web"
        cy.getbyTestAttr("header-logo-home").should("contain.text","Clinick Web");
        // Username tbox and placeholder
        cy.getbyTestAttr("login-username-input").should("be.visible").should("have.attr","placeholder","Username");
        // Password tbox and placeholder
        cy.getbyTestAttr("login-password-input").should("be.visible").should("have.attr","placeholder","Password");
        // login button (warning: should have specific id or test attribute)
        cy.getbyTestAttr("login-sign-in-button").should("be.visible").should("contain.text", "Sign in");
    });

    it("should log in the user with the correct credentials",() =>{
        // fill in username
        cy.getbyTestAttr("login-username-input").should("be.visible").type(Cypress.env("username"));
        // fill in password
        cy.getbyTestAttr("login-password-input").should("be.visible").type(Cypress.env("password"));
        //click login button (warning: should have specific id or test attribute)
        cy.getbyTestAttr("login-sign-in-button").should("be.visible").click();
    });
});
