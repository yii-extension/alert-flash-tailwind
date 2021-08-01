<?php

declare(strict_types=1);

namespace Yii\Extension\Tailwind;

use InvalidArgumentException;
use Yii\Extension\Widgets\Alert;
use Yii\Extension\Widgets\Widget;
use Yiisoft\Html\Html;
use Yiisoft\Session\Flash\FlashInterface;

final class AlertFlash extends Widget
{
    public const BUTTON_CSS_CLASS = 'float-right px-4 py-3';

    private array $alertTypes = [
        'danger' => 'bg-red-600',
        'dark' => 'bg-gray-600',
        'primary' => 'bg-blue-600',
        'info' => 'bg-indigo-600',
        'success' => 'bg-green-600',
        'warning' => 'bg-yellow-600',
    ];
    private array $bodyAttributes = [];
    private string $bodyClass = '';
    private bool $bodyContainer = false;
    private string $bodyContainerClass = '';
    private array $bodyContainerAttributes = [];
    /** @var non-empty-string */
    private string $bodyTag = 'span';
    private array $buttonAttributes = [];
    private string $buttonLabel = '';
    private string $buttonOnClick = '';
    private array $iconAttributes = [];
    private array $iconTypes = [
        'danger' => 'far fa-times-circle',
        'info' => 'far fa-info-circle',
        'success' => 'far fa-check-circle',
        'warning' => 'far fa-exclamation-circle',
    ];
    private array $headerAttributes = [];
    private string $headerClass = '';
    private bool $headerContainer = false;
    private string $headerContainerClass = '';
    private array $headerContainerAttributes = [];
    /** @var non-empty-string */
    private string $headerTag = 'h4';
    private string $layoutHeader = '';
    private string $layoutBody = '';

    private FlashInterface $flash;

    public function __construct(FlashInterface $flash)
    {
        $this->flash = $flash;
    }

    /**
     * The attributes for rendering the panel alert body.
     *
     * @param array $value
     *
     * @return static
     *
     * {@see Html::renderTagAttributes()} for details on how attributes are being rendered.
     */
    public function bodyAttributes(array $value): self
    {
        $new = clone $this;
        $new->bodyAttributes = $value;
        return $new;
    }

    /**
     * The CSS class for the alert panel body.
     *
     * @param string $value
     *
     * @return static
     */
    public function bodyClass(string $value): self
    {
        $new = clone $this;
        $new->bodyClass = $value;
        return $new;
    }

    /**
     * Allows you to add a div tag to the alert panel body.
     *
     * @param bool $value
     *
     * @return static
     */
    public function bodyContainer(bool $value = true): self
    {
        $new = clone $this;
        $new->bodyContainer = $value;
        return $new;
    }

    /**
     * The attributes for rendering the panel alert body.
     *
     * @param array $value
     *
     * @return static
     *
     * {@see Html::renderTagAttributes()} for details on how attributes are being rendered.
     */
    public function bodyContainerAttributes(array $value): self
    {
        $new = clone $this;
        $new->bodyContainerAttributes = $value;
        return $new;
    }

    /**
     * The CSS class for the alert panel body.
     *
     * @param string $value
     *
     * @return static
     */
    public function bodyContainerClass(string $value): self
    {
        $new = clone $this;
        $new->bodyContainerClass = $value;
        return $new;
    }

    /**
     * Set tag name for the alert panel body.
     *
     * @param string $value
     *
     * @return static
     * @throws InvalidArgumentException
     *
     */
    public function bodyTag(string $value): self
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Body tag must be a string and cannot be empty.');
        }

        $new = clone $this;
        $new->bodyTag = $value;
        return $new;
    }

    /**
     * The attributes for rendering the close button tag.
     *
     * The close button is displayed in the header of the modal window. Clicking on the button will hide the modal
     * window.
     *
     * If {@see closeButtonEnabled} is false, no close button will be rendered.
     *
     * The rest of the options will be rendered as the HTML attributes of the button tag.
     *
     * @param array $value
     *
     * @return static
     *
     * {@see Html::renderTagAttributes()} for details on how attributes are being rendered.
     */
    public function buttonAttributes(array $value): self
    {
        $new = clone $this;
        $new->buttonAttributes = $value;
        return $new;
    }

    /**
     * The label for the close button.
     *
     * @param string $value
     *
     * @return static
     */
    public function buttonLabel(string $value = ''): self
    {
        $new = clone $this;
        $new->buttonLabel = $value;
        return $new;
    }

    /**
     * The onclick JavaScript for the close button.
     *
     * @param string $value
     *
     * @return static
     */
    public function buttonOnClick(string $value = ''): self
    {
        $new = clone $this;
        $new->buttonOnClick = $value;
        return $new;
    }

    /**
     * The attributes for rendering the panel alert header.
     *
     * @param array $value
     *
     * @return static
     *
     * {@see Html::renderTagAttributes()} for details on how attributes are being rendered.
     */
    public function headerAttributes(array $value): self
    {
        $new = clone $this;
        $new->headerAttributes = $value;
        return $new;
    }

    /**
     * The CSS class for the alert panel header.
     *
     * @param string $value
     *
     * @return static
     */
    public function headerClass(string $value): self
    {
        $new = clone $this;
        $new->headerClass = $value;
        return $new;
    }

    /**
     * Allows you to add a div tag to the alert panel header.
     *
     * @param bool $value
     *
     * @return static
     */
    public function headerContainer(bool $value = true): self
    {
        $new = clone $this;
        $new->headerContainer = $value;
        return $new;
    }

    /**
     * The attributes for rendering the panel alert header.
     *
     * @param array $value
     *
     * @return static
     *
     * {@see Html::renderTagAttributes()} for details on how attributes are being rendered.
     */
    public function headerContainerAttributes(array $value): self
    {
        $new = clone $this;
        $new->headerContainerAttributes = $value;
        return $new;
    }

    /**
     * The CSS class for the alert panel header.
     *
     * @param string $value
     *
     * @return static
     */
    public function headerContainerClass(string $value): self
    {
        $new = clone $this;
        $new->headerContainerClass = $value;
        return $new;
    }

    /**
     * Set tag name for the alert panel header.
     *
     * @param string $value
     *
     * @return static
     * @throws InvalidArgumentException
     *
     */
    public function headerTag(string $value): self
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Header tag must be a string and cannot be empty.');
        }

        $new = clone $this;
        $new->headerTag = $value;
        return $new;
    }

    /**
     * The attributes for rendering the i tag for icons alerts.
     *
     * @param array $value
     *
     * @return static
     *
     * {@see Html::renderTagAttributes()} for details on how attributes are being rendered.
     */
    public function iconAttributes(array $value): self
    {
        $new = clone $this;
        $new->iconAttributes = $value;
        return $new;
    }

    /**
     * Set icons for alert types.
     */
    public function iconTypes(array $value): self
    {
        $new = clone $this;
        $new->iconTypes = $value;
        return $new;
    }

    /**
     * Set layout the alert panel body.
     *
     * @param string $value
     *
     * @return static
     */
    public function layoutBody(string $value): self
    {
        $new = clone $this;
        $new->layoutBody = $value;
        return $new;
    }

    /**
     * Set layout the alert panel header.
     *
     * @param string $value
     *
     * @return static
     */
    public function layoutHeader(string $value): self
    {
        $new = clone $this;
        $new->layoutHeader = $value;
        return $new;
    }

    protected function run(): string
    {
        $new = clone $this;
        return $new->renderAlertFlash($new);
    }

    /**
     * Render the alert component.
     */
    private function renderAlertFlash(self $new): string
    {
        $attributes = $new->getAttributes();
        $class = $new->getClass();

        if ($new->buttonAttributes === []) {
            Html::addCssClass($new->buttonAttributes, self::BUTTON_CSS_CLASS);
        }

        $flashMessages = $new->flash->getAll();

        $html = [];

        /** @var array $data */
        foreach ($flashMessages as $type => $data) {
            if (isset($new->alertTypes[$type]) && is_string($new->alertTypes[$type])) {
                /** @var array $messages */
                foreach ($data as $messages) {
                    /** @var array */
                    $attributes = $messages['attributes'] ?? $attributes;

                    /** @var string */
                    $body = $messages['body'] ?? '';

                    /** @var array */
                    $bodyAttributes = $messages['bodyAttributes'] ?? $new->bodyAttributes;

                    /** @var string */
                    $header = $messages['header'] ?? '';

                    /** @var array */
                    $iconAttributes = isset($messages['iconAttributes'])
                        ? $messages['iconAttributes'] : $new->iconAttributes;

                    /** @var string */
                    $iconClass = isset($messages['iconClass']) ? $messages['iconClass'] : '';

                    /** @var string */
                    $iconText = isset($messages['iconText']) ? $messages['iconText'] : '';

                    Html::addCssClass($attributes, $new->alertTypes[$type]);

                    if ($iconClass === '') {
                        /** @var string */
                        $iconClass = $new->iconTypes[$type] ?? '';
                    }

                    if ($body !== '') {
                        $html[] = Alert::widget()
                            ->attributes($attributes)
                            ->body($body)
                            ->bodyAttributes($bodyAttributes)
                            ->bodyClass($new->bodyClass)
                            ->bodyContainer($new->bodyContainer)
                            ->bodyContainerAttributes($new->bodyContainerAttributes)
                            ->bodyContainerClass($new->bodyContainerClass)
                            ->bodyTag($new->bodyTag)
                            ->buttonAttributes($new->buttonAttributes)
                            ->buttonLabel($new->buttonLabel)
                            ->buttonOnClick($new->buttonOnClick)
                            ->class($class)
                            ->header($header)
                            ->headerAttributes($new->headerAttributes)
                            ->headerClass($new->headerClass)
                            ->headerContainer($new->headerContainer)
                            ->headerContainerAttributes($new->headerContainerAttributes)
                            ->headerContainerClass($new->headerContainerClass)
                            ->headerTag($new->headerTag)
                            ->iconAttributes($iconAttributes)
                            ->iconClass($iconClass)
                            ->iconText($iconText)
                            ->layoutBody($new->layoutBody)
                            ->layoutHeader($new->layoutHeader)
                            ->render();
                    }
                }
            }
        }

        return implode(PHP_EOL, $html);
    }
}
