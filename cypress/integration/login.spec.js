require('dotenv').config();

const route = process.env.APP_URL_BASE;

describe('Login action test', function() {

    it('Login action', function() {

        let email = 'admin'
        let password = '123456'

        cy.visit(route+'/login');

        cy.get('body').then((body) => {
            if (body.find('.a-logout').length > 0) {
                cy.get('.a-logout').contains('Sair').click();
            }
        });

        cy.get('input[name=email]').type(email)
        cy.get('input[name=password]').type(password)
        cy.get('button').contains('Entrar').click()
        cy.url().should('contain', '/')
        cy.visit(route+'/administrativo')
    })

})
