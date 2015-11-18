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
    $element = $this->getSession()->getPage();
    $element->clickLink("פתיחת תפריט  מתכונים");
    $element->clickLink("כל המתכונים");
  }

  /**
   * @When I click on the Corn muffins orange recipe
   */
  public function iClickOnTheCornMuffinsOrangeRecipe()
  {
    $element = $this->getSession()->getPage();
    sleep(2);
    $share = $element->find('css',"#recipe-0 > recipe-box > div > div > div > a");
    $share->click();
  }

  /**
   * @Then I should be able to see the recipe
   */
  public function iShouldBeAbleToSeeTheRecipe()
  {
    sleep(5);
    $element = $this->getSession()->getPage();
    $element->getText("מרכיבים");
  }


}
