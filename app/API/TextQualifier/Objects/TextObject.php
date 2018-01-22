<?php
/**
 * Created by PhpStorm.
 * User: dk
 * Date: 17.01.18
 * Time: 20:20
 */

namespace App\API\TextQualifier\Objects;


use Illuminate\Support\Collection;

class TextObject
{
    /** @var string  */
    private $text;

    /** @var string */
    private $formattedText;

    /** @var array  */
    private $tokens = [];

    /**
     * TextObject constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getOriginal(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setFormattedText(string $text)
    {
        $this->formattedText = $text;
    }

    /**
     * @return string
     */
    public function getFormattedText(): string
    {
        return $this->formattedText;
    }

    /**
     * @param array $tokens
     */
    public function setTokens(array $tokens = [])
    {
        $this->tokens = $tokens;
    }

    /**
     * @param string|array $token
     * @return $this
     */
    public function addToken($token)
    {
        if (is_string($token)) {
            array_push($this->tokens, $token);
        }

        if (is_array($token)) {
            foreach ($token as $key => $value) {
                $this->tokens[$key] = $value;
            }
        }

        return $this;
    }

    /**
     * @return Collection
     */
    public function getTokens(): Collection
    {
        return collect($this->tokens);
    }
}