<?php

namespace Magium\Magento\Themes;

use Magium\AbstractConfigurableElement;
use Magium\Themes\ThemeConfigurationInterface;

class ThemeConfiguration extends AbstractConfigurableElement implements ThemeConfigurationInterface
{

    /**
     * @var string The Xpath string that finds the base of the navigation menu
     */
    protected $navigationBaseXPathSelector          = '//nav[@id="nav"]/ol';

    /**
     * @var string The Xpath string that can be used iteratively to find child navigation nodes
     */

    protected $navigationChildXPathSelector         = 'li[contains(concat(" ",normalize-space(@class)," ")," level%d ")]/a[.="%s"]/..';

    /**
     * @var string A simple, default path to use for categories.
     */

    protected $navigationPathToProductCategory      = 'Accessories/Jewelry';

    /**
     * @var string Xpath to add a Simple product to the cart from the product's page
     */

    protected $simpleProductAddToCartXpath          = '//button[@title="Add to Cart" and @onclick]';

    /**
     * @var string Xpath to add a Simple product to the cart from the category page
     */

    protected $categoryAddToCartButtonXPathSelector = '//button[@title="Add to Cart" and @onclick]';

    /**
     * @var string Xpath to find a product's link on a category page.  Used to navigate to the product from the category
     */

    protected $categoryProductPageXpath             = '//h2[@class="product-name"]/descendant::a';

    /**
     * @var string Xpath for the customer email form element
     */

    protected $loginUsernameField           = '//input[@type="email" and @id="email"]';

    /**
     * @var string Xpath for the customer password form element
     */

    protected $loginPasswordField           = '//input[@type="password" and @id="pass"]';


    /**
     * @var string Xpath for the customer login "submit" button
     */

    protected $loginSubmitButton            = '//button[@id="send2"]';


    /**
     * @var string Xpath used after a product has been added to the cart to verify that the product has been added to the cart
     */

    protected $addToCartSuccessXpath        = '//li[@class="success-msg" and contains(., "was added to your shopping cart")]';

    /**
     * @var string The base URL of the installation
     */

    protected $baseUrl                      = 'http://localhost/';

    protected $myAccountTitle               = 'My Account';

    /**
     * @var array Instructions in an Xpath array syntax to get to the login page.
     */
    
    protected $navigateToCustomerPageInstructions            = [
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@class="account-cart-wrapper"]/descendant::span[.="Account"]'],
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@id="header-account"]/descendant::a[@title="My Account"]']
    ];

    /**
     * @var array Instructions in an Xpath array syntax to get to the start of the checkout page
     */

    protected $checkoutNavigationInstructions         = [
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@class="header-minicart"]'],
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@class="minicart-actions"]/descendant::a[@title="Checkout"]']
    ];

    /**
     * @var array Instructions in an Xpath array syntax to get to the customer registration page
     */

    protected $registrationNavigationInstructions         = [
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@class="account-cart-wrapper"]/descendant::span[.="Account"]'],
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@id="header-account"]/descendant::a[@title="Register"]']
    ];

    /**
     * @var array Instructions in an Xpath array syntax to get to the customer registration page
     */

    protected $logoutNavigationInstructions         = [
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@class="account-cart-wrapper"]/descendant::span[.="Account"]'],
        [\Magium\WebDriver\WebDriver::INSTRUCTION_MOUSE_CLICK, '//div[@id="header-account"]/descendant::a[@title="Log Out"]']
    ];

    protected $registerFirstNameXpath           = '//input[@id="firstname"]';
    protected $registerLastNameXpath            = '//input[@id="lastname"]';
    protected $registerEmailXpath               = '//input[@id="email_address"]';
    protected $registerPasswordXpath            = '//input[@id="password"]';
    protected $registerConfirmPasswordXpath     = '//input[@id="confirmation"]';
    protected $registerNewsletterXpath          = '//input[@id="is_subscribed"]';
    protected $registerSubmitXpath              = '//button[@type="submit" and @title="Register"]';

    protected $logoutSuccessXpath               = '//div[contains(concat(" ",normalize-space(@class)," ")," page-title ")]/descendant::h1[.="You are now logged out"]';

    /**
     * This is a hard one.  Each of the summary checkout products will be iterated over until they cannot be found. Having
     * this work in a manner that gets all of the products, in all languages, in all themes, is quite difficult and
     * so the Xpath selector needs to be one that can find each individual column with an incrementing iterator.
     *
     * @see Magium\Magento\Actions\Checkout\Extractors\CartSummary for an example on how this is done
     *
     * @var string
     */

    protected $cartSummaryCheckoutProductLoopPriceXpath = '(//table[@id="checkout-review-table"]/tbody/descendant::td[@data-rwd-label="Price"])[%d]';
    protected $cartSummaryCheckoutProductLoopNameXpath = '(//table[@id="checkout-review-table"]/tbody/descendant::td/h3)[%d]';
    protected $cartSummaryCheckoutProductLoopQtyXpath = '(//table[@id="checkout-review-table"]/tbody/descendant::td[@data-rwd-label="Qty"])[%d]';
    protected $cartSummaryCheckoutProductLoopSubtotalXpath = '(//table[@id="checkout-review-table"]/tbody/descendant::td[@data-rwd-label="Subtotal"])[%d]';

    protected $cartSummaryCheckoutSubTotal              = '//table[@id="checkout-review-table"]/tfoot/tr/td[concat(" ",normalize-space(.)," ") = " Subtotal "]/../td[2]';
    protected $cartSummaryCheckoutTax              = '//table[@id="checkout-review-table"]/tfoot/tr/td[concat(" ",normalize-space(.)," ") = " Tax "]/../td[2]';
    protected $cartSummaryCheckoutGrandTotal              = '//table[@id="checkout-review-table"]/tfoot/tr/td[concat(" ",normalize-space(.)," ") = " Grand Total "]/../td[2]';
    protected $cartSummaryCheckoutShippingTotal              = '//table[@id="checkout-review-table"]/tfoot/tr/td[contains(concat(" ",normalize-space(.)," "), " Shipping & Handling (")]/../td[2]';

    /**
     * @return string
     */
    public function getCartSummaryCheckoutSubTotal()
    {
        return $this->cartSummaryCheckoutSubTotal;
    }

    /**
     * @return string
     */
    public function getCartSummaryCheckoutTax()
    {
        return $this->cartSummaryCheckoutTax;
    }

    /**
     * @return string
     */
    public function getCartSummaryCheckoutGrandTotal()
    {
        return $this->cartSummaryCheckoutGrandTotal;
    }

    /**
     * @return string
     */
    public function getCartSummaryCheckoutShippingTotal()
    {
        return $this->cartSummaryCheckoutShippingTotal;
    }



    /**
     * @return string
     */
    public function getCartSummaryCheckoutProductLoopPriceXpath()
    {
        return $this->cartSummaryCheckoutProductLoopPriceXpath;
    }

    /**
     * @return string
     */
    public function getCartSummaryCheckoutProductLoopNameXpath()
    {
        return $this->cartSummaryCheckoutProductLoopNameXpath;
    }

    /**
     * @return string
     */
    public function getCartSummaryCheckoutProductLoopQtyXpath()
    {
        return $this->cartSummaryCheckoutProductLoopQtyXpath;
    }

    /**
     * @return string
     */
    public function getCartSummaryCheckoutProductLoopSubtotalXpath()
    {
        return $this->cartSummaryCheckoutProductLoopSubtotalXpath;
    }



    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getLogoutSuccessXpath()
    {
        return $this->logoutSuccessXpath;
    }

    /**
     * @return array
     */
    public function getLogoutNavigationInstructions()
    {
        return $this->logoutNavigationInstructions;
    }



    /**
     * @return string
     */
    public function getMyAccountTitle()
    {
        return $this->myAccountTitle;
    }



    /**
     * @return string
     */
    public function getRegisterFirstNameXpath()
    {
        return $this->registerFirstNameXpath;
    }

    /**
     * @return string
     */
    public function getRegisterLastNameXpath()
    {
        return $this->registerLastNameXpath;
    }

    /**
     * @return string
     */
    public function getRegisterEmailXpath()
    {
        return $this->registerEmailXpath;
    }

    /**
     * @return string
     */
    public function getRegisterPasswordXpath()
    {
        return $this->registerPasswordXpath;
    }

    /**
     * @return string
     */
    public function getRegisterConfirmPasswordXpath()
    {
        return $this->registerConfirmPasswordXpath;
    }

    /**
     * @return string
     */
    public function getRegisterNewsletterXpath()
    {
        return $this->registerNewsletterXpath;
    }

    /**
     * @return string
     */
    public function getRegisterSubmitXpath()
    {
        return $this->registerSubmitXpath;
    }



    /**
     * @return array
     */
    public function getRegistrationNavigationInstructions()
    {
        return $this->registrationNavigationInstructions;
    }



    public function getCheckoutNavigationInstructions()
    {
        return $this->checkoutNavigationInstructions;
    }

    public function getProductPageForCategory()
    {
        return $this->categoryProductPageXpath;
    }

    public function getAddToCartSuccessXpath()
    {
        return $this->addToCartSuccessXpath;
    }
    
    public function getNavigateToCustomerPageInstructions()
    {
        return $this->navigateToCustomerPageInstructions;
    }
    
    public function getNavigationBaseXPathSelector()
    {
        return $this->navigationBaseXPathSelector;
    }
    
    public function getNavigationChildXPathSelector()
    {
        return $this->navigationChildXPathSelector;
    }
    
    public function getNavigationPathToProductCategory()
    {
        return $this->navigationPathToProductCategory;
    }
    
    public function getCategoryAddToCartButtonXPathSelector()
    {
        return $this->categoryAddToCartButtonXPathSelector;
    }
    
    public function getLoginUsernameField()
    {
        return $this->loginUsernameField;
    }

    public function getSimpleProductAddToCartXpath()
    {
        return $this->simpleProductAddToCartXpath;
    }
    
    public function getLoginPasswordField()
    {
        return $this->loginPasswordField;
    } 
    
    public function getLoginSubmitButton()
    {
        return $this->loginSubmitButton;
    }
    
}