const loginAction = () => {

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
}

describe('First Test User', function () {

    beforeEach(function () {
        loginAction();
    });

    it('Test access page index', function () {
        cy.visit(route+'/administrativo/usuarios');
        cy.visit(route+'/administrativo/usuarios');
        cy.title().should('contain', 'Usuários');
    });

    it('Test create user', function () {
        cy.visit(route+'/administrativo/usuarios/novo')
        cy.get("input[name='first_name']").type('Joao');
        cy.get("input[name='last_name']").type('Paulo');
        cy.get("input[name='email']").type('joao@cypress.com');
        cy.get("input[name='birth_date']").type('01/01/2000');
        cy.get("#genre").select('Masculino');
        cy.get("input[name='password']").type('12345678');
        cy.get("input[name='password_confirmation']").type('12345678');
        cy.get("input[name='address']").type('Avenida Teste');
        cy.get("input[name='number']").type('500');
        cy.get("input[name='neighborhood']").type('Bairro Teste');
        cy.get("input[name='zip_code']").type('00000-000');
        cy.get("input[name='complement']").type('Nenhum');
        cy.get("input[name='latitude']").type('00.000');
        cy.get("input[name='longitude']").type('00.000');
        cy.get('#state').next().click();
        cy.get('#select2-state-results').children().first().click();
        cy.get("#roles").select('Administrador');
        cy.get('button').contains('Cadastrar').click()
        cy.get('.noty_body').should('contain', 'Usuário cadastrado com sucesso')
    })

    it('Test edit user', function () {
        cy.visit(route+'/administrativo/usuarios');
        cy.wait(5000);
        cy.get('.btn-edit-item').then(($elRowsEdit) => {
            if ($elRowsEdit.length > 0) {
                $elRowsEdit[3].click();
                cy.get("input[name='first_name']").clear();
                cy.get("input[name='first_name']").type('Daniel');
                cy.get("input[name='last_name']").clear();
                cy.get("input[name='last_name']").type('Rodrigues');
                cy.get('button').contains('Atualizar').click()
                cy.get('.noty_body').should('contain', 'Usuário atualizado com sucesso')
            }
        })
    });

    it('Test delete user', function () {
        cy.visit(route+'/administrativo/usuarios');
        cy.wait(5000);
        cy.get('.btn-delete-item').then(($elRowsDelete) => {
            if ($elRowsDelete.length > 0) {
                $elRowsDelete[2].click();
                cy.get('button').contains('Sim').click()
                cy.get('.noty_body').should('contain', 'Usuário removido com sucesso')
            }
        })
    })
})
