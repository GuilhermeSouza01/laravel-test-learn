<?php

use App\Services\PriceCalculatorService;

describe('PriceCalculator - Percentage Discount', function () {
    it('applies percentage discount', function () {
        $calc = new PriceCalculatorService();

        expect($calc->applyPercentageDiscount(100, 20))
            ->toBe(80.0);
    });

    it('round discounted price', function () {
        $calc = new PriceCalculatorService();

        expect($calc->applyPercentageDiscount(100, 12.345))
            ->toBe(87.66);
    });
});

describe('PriceCalculator - Fixed Discount', function () {
    it('applies fixed discount', function () {
        $calc = new PriceCalculatorService();

        expect($calc->applyFixedDiscount(100, 20))
            ->toBe(80.0);
    });

    it('does not go below zero', function () {
        $calc = new PriceCalculatorService();

        expect($calc->applyFixedDiscount(50, 100))
            ->toBe(0.00);
    });

    it('throws exception for negative discount', function () {
        $calc = new PriceCalculatorService();

        expect(fn () => $calc->applyFixedDiscount(100, -10))
            ->toThrow(InvalidArgumentException::class);
    });
});

describe('PriceCalculator - Tax and Final Price', function () {
    it('adds tax to price', function () {
        $calc = new PriceCalculatorService();

        expect($calc->addTax(100, 10))
            ->toBe(110.0);
    });

    it('rounds taxed price', function () {
        $calc = new PriceCalculatorService();
        expect($calc->addTax(100, 12.345))
            ->toBe(112.35);
    });

    it('calculates final price with discount and tax', function () {
        $calc = new PriceCalculatorService();

        expect($calc->finalPrice(100, 10, 21))
            ->toBe(108.9);
    });
});
