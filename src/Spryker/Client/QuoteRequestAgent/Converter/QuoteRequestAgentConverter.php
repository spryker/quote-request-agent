<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\QuoteRequestAgent\Converter;

use Generated\Shared\Transfer\QuoteErrorTransfer;
use Generated\Shared\Transfer\QuoteRequestTransfer;
use Generated\Shared\Transfer\QuoteResponseTransfer;
use Spryker\Client\QuoteRequestAgent\Dependency\Client\QuoteRequestAgentToQuoteClientInterface;
use Spryker\Client\QuoteRequestAgent\Status\QuoteRequestAgentStatusInterface;

class QuoteRequestAgentConverter implements QuoteRequestAgentConverterInterface
{
    /**
     * @var string
     */
    protected const GLOSSARY_KEY_WRONG_QUOTE_REQUEST_STATUS = 'quote_request.checkout.validation.error.wrong_status';

    /**
     * @var \Spryker\Client\QuoteRequestAgent\Dependency\Client\QuoteRequestAgentToQuoteClientInterface
     */
    protected $quoteClient;

    /**
     * @var \Spryker\Client\QuoteRequestAgent\Status\QuoteRequestAgentStatusInterface
     */
    protected $quoteRequestAgentStatus;

    public function __construct(
        QuoteRequestAgentToQuoteClientInterface $quoteClient,
        QuoteRequestAgentStatusInterface $quoteRequestAgentStatus
    ) {
        $this->quoteClient = $quoteClient;
        $this->quoteRequestAgentStatus = $quoteRequestAgentStatus;
    }

    public function convertQuoteRequestToQuote(QuoteRequestTransfer $quoteRequestTransfer): QuoteResponseTransfer
    {
        if (!$this->quoteRequestAgentStatus->isQuoteRequestEditable($quoteRequestTransfer)) {
            return $this->getErrorResponse(static::GLOSSARY_KEY_WRONG_QUOTE_REQUEST_STATUS);
        }

        $quoteTransfer = $quoteRequestTransfer->getLatestVersion()->getQuote();

        $quoteTransfer
            ->setQuoteRequestReference($quoteRequestTransfer->getQuoteRequestReference())
            ->setQuoteRequestVersionReference($quoteRequestTransfer->getLatestVersion()->getVersionReference())
            ->setName($quoteRequestTransfer->getQuoteRequestReference());

        $this->quoteClient->setQuote($quoteTransfer);

        return (new QuoteResponseTransfer())
            ->setIsSuccessful(true)
            ->setQuoteTransfer($quoteTransfer);
    }

    protected function getErrorResponse(string $message): QuoteResponseTransfer
    {
        return (new QuoteResponseTransfer())
            ->setIsSuccessful(false)
            ->addError((new QuoteErrorTransfer())->setMessage($message));
    }
}
