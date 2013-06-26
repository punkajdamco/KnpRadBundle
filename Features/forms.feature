Feature: Smart forms

    Scenario: Form configures itself based on its data

        Given I am on "/form"
        Then show last response
        When I press "Submit"
        Then I should see "Success"

