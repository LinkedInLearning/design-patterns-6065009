<?php
// ConcreteStrategy – Bezahlung per Kreditkarte
class CreditCardPayment {
    private string $cardNumber;

    public function __construct(string $cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function pay(float $amount) {
        echo "Bezahlung von {$amount}€ per Kreditkarte ({$this->cardNumber})\n";
    }
}

// ConcreteStrategy – Bezahlung per PayPal
class PayPalPayment {
    private string $email;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function pay(float $amount) {
        echo "Bezahlung von {$amount}€ per PayPal ({$this->email})\n";
    }
}

// Context – verwendet eine Strategy
class ShoppingCart {
    private $paymentMethod;

    public function setPaymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function checkout(float $amount) {
        $this->paymentMethod->pay($amount);
    }
}

// Client-Code
$cart = new ShoppingCart();

// Kreditkarte als Zahlungsmethode
$cart->setPaymentMethod(new CreditCardPayment("1234-5678-9876-5432"));
$cart->checkout(99.99);

// PayPal als Zahlungsmethode
$cart->setPaymentMethod(new PayPalPayment("user@example.com"));
$cart->checkout(49.50);
