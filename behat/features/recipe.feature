Feature: Recipe
  In order to be able to view and get info about the recipes
  As an anonymous user
  We need to be able to have access to the recipe

  @javascript
  Scenario: Visit the recipe
    Given I am an anonymous user
    When  I visit the all recipes page
    And   I click on the first recipe
    Then  I should be able to see the recipe
