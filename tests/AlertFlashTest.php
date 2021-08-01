<?php

declare(strict_types=1);

namespace Yii\Extension\Tailwind\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Yii\Extension\Tailwind\AlertFlash;
use Yii\Extension\Tailwind\Tests\TestSupport\TestTrait;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Session\Flash\FlashInterface;
use Yiisoft\Session\Session;

/**
 * @runTestsInSeparateProcesses
 */
final class AlertFlashTest extends TestCase
{
    use testTrait;

    private FlashInterface $flash;

    /**
     * @throws ReflectionException
     */
    public function testBodyAttributes(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyAttributes(['class' => 'test-class'])
            ->layoutBody('{body}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <span class="test-class">This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testBodyClass(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])->bodyClass('test-class')->layoutBody('{body}')->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <span class="test-class">This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testBodyContainerAttributes(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyContainer()
            ->bodyContainerAttributes(['class' => 'test-container-class'])
            ->layoutBody('{body}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <div class="test-container-class">
        <span>This is a test.</span>
        </div>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testBodyTagException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Body tag must be a string and cannot be empty.');
        AlertFlash::widget([$this->flash])->bodyTag('');
    }

    /**
     * @throws ReflectionException
     */
    public function testButtonAttributes(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->buttonAttributes(['class' => 'has-background-danger'])
            ->layoutBody('{body}{button}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <span>This is a test.</span>
        <button type="button" class="has-background-danger"></button>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testEmpty(): void
    {
        $this->flash->add('', [], true);
        $this->assertEmpty(AlertFlash::widget([$this->flash])->render());
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderAttributes(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerAttributes(['class' => 'test-class'])
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <h4 class="test-class">Header title.</h4>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderClass(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerClass('test-class')
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <h4 class="test-class">Header title.</h4>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderContainerAttributes(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerContainer()
            ->headerContainerAttributes(['class' => 'test-class'])
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <div class="test-class">
        <h4>Header title.</h4>
        </div>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderContainerClass(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerContainer()
            ->headerContainerClass('test-container-class')
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <div class="test-container-class">
        <h4>Header title.</h4>
        </div>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderTagException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header tag must be a string and cannot be empty.');
        AlertFlash::widget([$this->flash])->headerTag('');
    }

    /**
     * @throws ReflectionException
     */
    public function testIconTypes(): void
    {
        $this->flash->add('danger', ['body' => 'Body message.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyClass('align-middle flex-grow inline-block mr-8')
            ->bodyTag('p')
            ->buttonLabel('&times;')
            ->buttonOnClick('closeAlert()')
            ->class('flex font-bold items-center px-4 py-3 text-sm text-white')
            ->iconAttributes(['class' => 'fa-2x mr-4'])
            ->iconTypes(['danger' => 'far fa-times-circle'])
            ->layoutBody('{icon}{body}{button}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600 flex font-bold items-center px-4 py-3 text-sm text-white" role="alert">
        <div><i class="fa-2x mr-4 far fa-times-circle"></i></div>
        <p class="align-middle flex-grow inline-block mr-8">Body message.</p>
        <button type="button" class="float-right px-4 py-3" onclick="closeAlert()">&times;</button>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testRenderDanger(): void
    {
        $this->flash->add('danger', ['body' => '<b>Holy smokes!</b> Something seriously bad happened.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyClass('align-middle flex-grow inline-block mr-8')
            ->bodyTag('p')
            ->buttonLabel('&times;')
            ->buttonOnClick('closeAlert()')
            ->iconAttributes(['class' => 'fa-2x pr-2'])
            ->class('flex font-bold items-center px-4 py-3 text-sm text-white')
            ->layoutBody('{icon}{body}{button}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600 flex font-bold items-center px-4 py-3 text-sm text-white" role="alert">
        <div><i class="fa-2x pr-2 far fa-times-circle"></i></div>
        <p class="align-middle flex-grow inline-block mr-8"><b>Holy smokes!</b> Something seriously bad happened.</p>
        <button type="button" class="float-right px-4 py-3" onclick="closeAlert()">&times;</button>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testRenderDangerWithHeader(): void
    {
        $this->flash->add('danger', ['header' => 'Danger', 'body' => 'Something not ideal might be happening.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyClass('align-middle inline-block mr-8 px-4 py-3')
            ->bodyContainer()
            ->bodyContainerClass('bg-red-100 border border-red-400 border-t-0 rounded-b text-red-700')
            ->buttonLabel('&times;')
            ->buttonOnClick('closeAlert()')
            ->headerClass('font-semibold')
            ->headerContainer()
            ->headerContainerClass('font-bold px-4 py-2 rounded-t text-white')
            ->headerTag('span')
            ->layoutBody('{body}{button}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="bg-red-600" role="alert">
        <div class="font-bold px-4 py-2 rounded-t text-white">
        <span class="font-semibold">Danger</span>
        </div>
        <div class="bg-red-100 border border-red-400 border-t-0 rounded-b text-red-700">
        <span class="align-middle inline-block mr-8 px-4 py-3">Something not ideal might be happening.</span>
        <button type="button" class="float-right px-4 py-3" onclick="closeAlert()">&times;</button>
        </div>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->flash = new Flash(new Session([0], null));
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->flash);
    }
}
