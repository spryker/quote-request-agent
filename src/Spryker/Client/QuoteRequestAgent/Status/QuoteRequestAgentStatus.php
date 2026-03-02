<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\QuoteRequestAgent\Status;

use Generated\Shared\Transfer\QuoteRequestTransfer;
use Spryker\Client\QuoteRequestAgent\QuoteRequestAgentConfig;
use Spryker\Shared\QuoteRequestAgent\QuoteRequestAgentConfig as SharedQuoteRequestAgentConfig;

class QuoteRequestAgentStatus implements QuoteRequestAgentStatusInterface
{
    /**
     * @var \Spryker\Client\QuoteRequestAgent\QuoteRequestAgentConfig
     */
    protected $quoteRequestAgentConfig;

    public function __construct(QuoteRequestAgentConfig $quoteRequestAgentConfig)
    {
        $this->quoteRequestAgentConfig = $quoteRequestAgentConfig;
    }

    public function isQuoteRequestCancelable(QuoteRequestTransfer $quoteRequestTransfer): bool
    {
        return in_array($quoteRequestTransfer->getStatus(), $this->quoteRequestAgentConfig->getCancelableStatuses(), true);
    }

    public function isQuoteRequestRevisable(QuoteRequestTransfer $quoteRequestTransfer): bool
    {
        return in_array($quoteRequestTransfer->getStatus(), $this->quoteRequestAgentConfig->getRevisableStatuses(), true);
    }

    public function isQuoteRequestEditable(QuoteRequestTransfer $quoteRequestTransfer): bool
    {
        return $quoteRequestTransfer->getStatus() === SharedQuoteRequestAgentConfig::STATUS_IN_PROGRESS;
    }
}
