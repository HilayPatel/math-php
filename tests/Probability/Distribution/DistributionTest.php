<?php
namespace Math\Probability;

class DistributionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProviderForBinomialPMF
     */
    public function testBinomialPMF(int $n, int $r, float $p, float $binomial_distribution)
    {
        $this->assertEquals($binomial_distribution, Distribution::binomialPMF($n, $r, $p), '', 0.001);
    }

    /**
     * Data provider for binomial
     * Data: [ n, r, p, binomial distribution ]
     */
    public function dataProviderForBinomialPMF()
    {
        return [
        [ 2, 1, 0.5, 0.5 ],
        [ 2, 1, 0.4, 0.48 ],
        [ 6, 2, 0.7, 0.0595350 ],
        [ 8, 7, 0.83, 0.3690503 ],
        [ 10, 5, 0.85, 0.0084909 ],
        [ 50, 48, 0.97, 0.2555182 ],
        [ 5, 4, 1, 0.0 ],
        [ 12, 4, 0.2, 0.1329 ]
        ];
    }

    public function testBinomialPMFProbabilityLowerBoundException()
    {
        $this->setExpectedException('\Exception');
        Distribution::binomialPMF(6, 2, -0.1);
    }

    public function testBinomialPMFProbabilityUpperBoundException()
    {
        $this->setExpectedException('\Exception');
        Distribution::binomialPMF(6, 2, 1.1);
    }

    /**
     * @dataProvider dataProviderForBinomialCDF
     */
    public function testBinomialCDF(int $n, int $r, float $p, float $cumulative_binomial_distribution)
    {
        $this->assertEquals($cumulative_binomial_distribution, Distribution::binomialCDF($n, $r, $p), '', 0.001);
    }

    /**
     * Data provider for cumulative binomial
     * Data: [ n, r, p, cumulative binomial distribution ]
     */
    public function dataProviderForBinomialCDF()
    {
        return [
            [ 2, 1, 0.5, 0.75 ],
            [ 2, 1, 0.4, 0.84 ],
            [ 6, 2, 0.7, 0.07047 ],
            [ 8, 7, 0.83, 0.7747708 ],
            [ 10, 5, 0.85, 0.009874091 ],
            [ 50, 48, 0.97, 0.4447201 ],
            [ 5, 4, 1, 0.0 ],
            [ 12, 4, 0.2, 0.92744 ],
        ];
    }

    /**
     * @dataProvider dataProviderForNegativeBinomial
     */
    public function testNegativeBinomial(int $x, int $r, float $P, float $neagative_binomial_distribution)
    {
        $this->assertEquals($neagative_binomial_distribution, Distribution::negativeBinomial($x, $r, $P), '', 0.001);
    }

    /**
     * Data provider for neagative binomial
     * Data: [ x, r, P, negative binomial distribution ]
     */
    public function dataProviderForNegativeBinomial()
    {
        return [
            [ 2, 1, 0.5, 0.25 ],
            [ 2, 1, 0.4, 0.24 ],
            [ 6, 2, 0.7, 0.019845 ],
            [ 8, 7, 0.83, 0.322919006776561 ],
            [ 10, 5, 0.85, 0.00424542789316406 ],
            [ 50, 48, 0.97, 0.245297473979909 ],
            [ 5, 4, 1, 0.0 ],
            [ 2, 2, 0.5, 0.25 ],
        ];
    }

    public function testNegativeBinomialProbabilityLowerBoundException()
    {
        $this->setExpectedException('\Exception');
        Distribution::negativeBinomial(6, 2, -0.1);
    }

    public function testNegativeBinomialProbabilityUpperBoundException()
    {
        $this->setExpectedException('\Exception');
        Distribution::negativeBinomial(6, 2, 1.1);
    }

    /**
     * @dataProvider dataProviderForPascal
     */
    public function testPascal(int $x, int $r, float $P, float $neagative_binomial_distribution)
    {
        $this->assertEquals($neagative_binomial_distribution, Distribution::pascal($x, $r, $P), '', 0.001);
    }

    /**
     * Data provider for Pascal
     * Data: [ x, r, P, negative binomial distribution ]
     */
    public function dataProviderForPascal()
    {
        return [
            [ 2, 1, 0.5, 0.25 ],
            [ 2, 1, 0.4, 0.24 ],
            [ 6, 2, 0.7, 0.019845 ],
            [ 8, 7, 0.83, 0.322919006776561 ],
            [ 10, 5, 0.85, 0.00424542789316406 ],
            [ 50, 48, 0.97, 0.245297473979909 ],
            [ 5, 4, 1, 0.0 ],
            [ 2, 2, 0.5, 0.25 ],
        ];
    }

    public function testPascalProbabilityLowerBoundException()
    {
        $this->setExpectedException('\Exception');
        Distribution::pascal(6, 2, -0.1);
    }

    public function testPascalProbabilityUpperBoundException()
    {
        $this->setExpectedException('\Exception');
        Distribution::pascal(6, 2, 1.1);
    }

    /**
     * @dataProvider dataProviderForPoissonPMF
     */
    public function testPoissonPMF(int $k, float $λ, float $probability)
    {
        $this->assertEquals($probability, Distribution::poissonPMF($k, $λ), '', 0.001);
    }

    /**
     * Data provider for poisson
     * Data: [ k, λ, poisson distribution ]
     */
    public function dataProviderForPoissonPMF()
    {
        return [
            [ 3, 2, 0.180 ],
            [ 3, 5, 0.140373895814280564513 ],
            [ 8, 6, 0.103257733530844 ],
            [ 2, 0.45, 0.065 ],
            [ 16, 12, 0.0542933401099791 ],
        ];
    }

    /**
     * @dataProvider dataProviderForPoissonCDF
     */
    public function testPoissonCDF(int $k, float $λ, float $probability)
    {
        $this->assertEquals($probability, Distribution::poissonCDF($k, $λ), '', 0.001);
    }

    /**
     * Data provider for cumulative poisson
     * Data: [ k, λ, culmulative poisson distribution ]
     */
    public function dataProviderForPoissonCDF()
    {
        return [
            [ 3, 2, 0.857123460498547048662 ],
            [ 3, 5, 0.2650 ],
            [ 8, 6, 0.8472374939845613089968 ],
            [ 2, 0.45, 0.99 ],
            [ 16, 12, 0.898708992560164 ],
        ];
    }

    public function testPoissonExceptionWhenKLessThanZero()
    {
        $this->setExpectedException('\Exception');
        Distribution::poissonPMF(-1, 2);
    }

    public function testPoissonExceptionWhenλLessThanZero()
    {
        $this->setExpectedException('\Exception');
        Distribution::poissonPMF(2, -1);
    }

    /**
     * @dataProvider dataProviderForContinuousUniform
     */
    public function testContinuousUniform($a, $b, $x₁, $x₂, $probability)
    {
        $this->assertEquals($probability, Distribution::continuousUniform($a, $b, $x₁, $x₂), '', 0.001);
    }

    public function dataProviderForContinuousUniform()
    {
        return [
            [ 1, 4, 2, 3, 0.3333 ],
            [ 0.6, 12.2, 2.1, 3.4, 0.11206897 ],
            [ 1.6, 14, 4, 9, 0.40322581 ],
        ];
    }

    public function testContinuousUniformExceptionXOutOfBounds()
    {
        $this->setExpectedException('\Exception');
        Distribution::continuousUniform(1, 2, 3, 4);
    }

    /**
     * @dataProvider dataProviderForExponentialPDF
     */
    public function testExponential($λ, $x, $probability)
    {
        $this->assertEquals($probability, Distribution::exponentialPDF($λ, $x), '', 0.001);
    }

    public function dataProviderForExponentialPDF()
    {
        return [
            [ 1, 0, 1 ],
            [ 1, 1, 0.36787944117 ],
            [ 1, 2, 0.13533528323 ],
            [ 1, 3, 0.04978706836 ],
        ];
    }

    /**
     * @dataProvider dataProviderForExponentialCDF
     */
    public function testExponentialCDF($λ, $x, $probability)
    {
        $this->assertEquals($probability, Distribution::ExponentialCDF($λ, $x), '', 0.001);
    }

    public function dataProviderForExponentialCDF()
    {
        return [
            [ 1, 0, 0 ],
            [ 1, 1, 0.6321206 ],
            [ 1, 2, 0.8646647 ],
            [ 1, 3, 0.9502129 ],
            [ 1/3, 2, 0.4865829 ],
            [ 1/3, 4, 0.7364029 ],
            [ 1/5, 4, 0.550671 ],
        ];
    }

    /**
     * @dataProvider dataProviderForExponentialCDFBetween
     */
    public function testExponentialCDFBetween($λ, $x₁, $x₂, $probability)
    {
        $this->assertEquals($probability, Distribution::ExponentialCDFBetween($λ, $x₁, $x₂), '', 0.001);
    }

    public function dataProviderForExponentialCDFBetween()
    {
        return [
            [ 1, 2, 3, 0.0855 ],
            [ 1, 3, 2, -0.0855 ],
            [ 0.5, 2, 4, 0.23254 ],
            [ 1/3, 2, 4, 0.24982 ],
            [ 0.125, 5.4, 5.6, 0.01257 ],
        ];
    }

    /**
     * @dataProvider dataProviderForNormalPDF
     */
    public function testNormalPDF($x, $μ, $σ, $pdf)
    {
        $this->assertEquals($pdf, Distribution::normalPDF($x, $μ, $σ), '', 0.001);
    }

    public function dataProviderForNormalPDF()
    {
        return [
            [ 84, 72, 15.2, 0.01921876 ],
            [ 26, 25, 2, 0.17603266338 ],
            [ 4, 0, 1, .000133830225 ],
        ];
    }

    /**
     * @dataProvider dataProviderForNormalCDF
     */
    public function testNormalCDF($x, $μ, $σ, $probability)
    {
        $this->assertEquals($probability, Distribution::normalCDF($x, $μ, $σ), '', 0.001);
    }

    public function dataProviderForNormalCDF()
    {
        return [
            [ 84, 72, 15.2, 0.7851 ],
            [ 26, 25, 2, 0.6915 ],
            [ 6, 5, 1, 0.8413 ],
            [ 39, 25, 14, 0.8413 ],
            [ 1.96, 0, 1, 0.975 ],
            [ 3.5, 4, 0.3, 0.0478 ],
            [ 1.3, 1, 1.1, 0.6075 ],
        ];
    }

    /**
     * @dataProvider dataProviderForNormalCDFAbove
     */
    public function testNormalCDFAbove($x, $μ, $σ, $probability)
    {
        $this->assertEquals($probability, Distribution::normalCDFAbove($x, $μ, $σ), '', 0.001);
    }

    public function dataProviderForNormalCDFAbove()
    {
        return [
            [ 1.96, 0, 1, 0.025 ],
            [ 3.5, 4, 0.3, 0.9522  ],
            [ 1.3, 1, 1.1, 0.3925 ],
        ];
    }

    /**
     * @dataProvider dataProviderForNormalCDFBetween
     */
    public function testNormalCDFBetween($x₁, $x₂, $μ, $σ, $probability)
    {
        $this->assertEquals($probability, Distribution::normalCDFBetween($x₁, $x₂, $μ, $σ), '', 0.001);
    }

    public function dataProviderForNormalCDFBetween()
    {
        return [
            [ -1.96, 1.96, 0, 1, 0.95 ],
            [ 3.5, 4.4, 4, 0.3, 0.861 ],
            [ -1.3, 1.3, 1, 1.1, 0.5892 ],
        ];
    }

    /**
     * @dataProvider dataProviderForNormalCDFOutside
     */
    public function testNormalCDFOutside($x₁, $x₂, $μ, $σ, $probability)
    {
        $this->assertEquals($probability, Distribution::normalCDFOutside($x₁, $x₂, $μ, $σ), '', 0.001);
    }

    public function dataProviderForNormalCDFOutside()
    {
        return [
            [ -1.96, 1.96, 0, 1, 0.05 ],
            [ 3.5, 4.4, 4, 0.3, 0.139 ],
            [ -1.3, 1.3, 1, 1.1, 0.4108 ],
        ];
    }

    /**
     * @dataProvider dataProviderForLogNormalPDF
     */
    public function testLogNormalPDF($x, $μ, $σ, $pdf)
    {
        $this->assertEquals($pdf, Distribution::logNormalPDF($x, $μ, $σ), '', 0.001);
    }

    public function dataProviderForLogNormalPDF()
    {
        return [
            [ 4.3, 6, 2, 0.003522012 ],
            [ 4.3, 6, 1, 0.000003083 ],
            [ 4.3, 1, 1, 0.083515969 ],
            [ 1, 6, 2, 0.002215924 ],
            [ 2, 6, 2, 0.002951125 ],
            [ 2, 3, 2, 0.051281299 ],
        ];
    }

    /**
     * @dataProvider dataProviderForLogNormalCDF
     */
    public function testLogNormalCDF($x, $μ, $σ, $cdf)
    {
        $this->assertEquals($cdf, Distribution::logNormalCDF($x, $μ, $σ), '', 0.001);
    }

    public function dataProviderForLogNormalCDF()
    {
        return [
            [ 4.3, 6, 2, 0.0115828 ],
            [ 4.3, 6, 1, 0.000002794 ],
            [ 4.3, 1, 1, 0.676744677 ],
            [ 1, 6, 2, 0.001349898 ],
            [ 2, 6, 2, 0.003983957 ],
            [ 2, 3, 2, 0.124367703 ],
        ];
    }

    /**
     * @dataProvider dataProviderForParetoPDF
     */
    public function testParetoPDF($a, $b, $x, $pdf)
    {
        $this->assertEquals($pdf, Distribution::paretoPDF($a, $b, $x), '', 0.01);
    }

    public function dataProviderForParetoPDF()
    {
        return [
            [ 1, 2, 1, 0 ],
            [ 1, 1, 1, 1 ],
            [ 8, 2, 5, 0.001048576 ],
            [ 8, 2, 4, 0.0078125 ],
            [ 4, 5, 9, 0.0423377195 ],

        ];
    }

    /**
     * @dataProvider dataProviderForParetoCDF
     */
    public function testParetoCDF($a, $b, $x, $cdf)
    {
        $this->assertEquals($cdf, Distribution::paretoCDF($a, $b, $x), '', 0.01);
    }

    public function dataProviderForParetoCDF()
    {
        return [
            [ 1, 2, 1, 0 ],
            [ 1, 1, 1, 0.001 ],
            [ 1, 1, 2, 0.500 ],
            [ 1, 1, 3.2, 0.688 ],
            [ 5.1, 5.4, 5.4, 0.001 ],
            [ 5.1, 5.4, 6.78, 0.687 ],
            [ 5.1, 5.4, 9.2, 0.934 ],
        ];
    }
}