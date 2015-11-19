<?php

use Drupal\DrupalExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

class FeatureContext extends MinkContext implements SnippetAcceptingContext {

  /**
   * @Given I am an anonymous user
   */
  public function iAmAnAnonymousUser() {
    // Just let this pass-through.
  }

  /**
   * @When I visit the homepage
   */
  public function iVisitTheHomepage() {
    $this->getSession()->visit($this->locatePath('/'));
  }

  /**
   * @Then I should have access to the page
   */
  public function iShouldHaveAccessToThePage() {
    $this->assertSession()->statusCodeEquals('200');
  }

  /**
   * @Then I should not have access to the page
   */
  public function iShouldNotHaveAccessToThePage() {
    $this->assertSession()->statusCodeEquals('403');
  }

  /**
   * @When I visit the all recipes page
   */
  public function iVisitTheAllRecipesPage()
  {
    $this->iVisitTheHomepage();
    sleep(15);
    $element = $this->getSession()->getPage();
    $element->clickLink("פתיחת תפריט  מתכונים");
    $element->clickLink("כל המתכונים");
  }

  /**
   * @When I click on the first recipe
   */
  public function iClickOnTheFirstRecipe() {
    $element = $this->getSession()->getPage();
    sleep(2);
    $recipe = $element->find('css',"#recipe-0 > recipe-box > div > div > a");
    $recipe->click();
  }

  /**
   * @Then I should be able to see the recipe
   */
  public function iShouldBeAbleToSeeTheRecipe() {
    $element = $this->getSession()->getPage();
    $element->getText("מרכיבים");
    sleep(3);
  }


}
