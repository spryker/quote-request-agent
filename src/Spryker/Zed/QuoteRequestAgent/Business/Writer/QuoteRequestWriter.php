<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\QuoteRequestAgent\Business\Writer;

use Generated\Shared\Transfer\QuoteRequestFilterTransfer;
use Generated\Shared\Transfer\QuoteRequestResponseTransfer;
use Generated\Shared\Transfer\QuoteRequestTransfer;
use Spryker\Zed\QuoteRequestAgent\Dependency\Facade\QuoteRequestAgentToQuoteRequestFacadeInterface;

class QuoteRequestWriter implements QuoteRequestWriterInterface
{
    /**
     * @var \Spryker\Zed\QuoteRequestAgent\Dependency\Facade\QuoteRequestAgentToQuoteRequestFacadeInterface
     */
    protected $quoteRequestFacade;

    public function __construct(QuoteRequestAgentToQuoteRequestFacadeInterface $quoteRequestFacade)
    {
        $this->quoteRequestFacade = $quoteRequestFacade;
    }

    public function createQuoteRequest(QuoteRequestTransfer $quoteRequestTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->createQuoteRequestForCompanyUser($quoteRequestTransfer);
    }

    public function updateQuoteRequest(QuoteRequestTransfer $quoteRequestTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->updateQuoteRequestForCompanyUser($quoteRequestTransfer);
    }

    public function cancelQuoteRequest(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->cancelQuoteRequestForCompanyUser($quoteRequestFilterTransfer);
    }

    public function reviseQuoteRequest(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->reviseQuoteRequestForCompanyUser($quoteRequestFilterTransfer);
    }

    public function sendQuoteRequestToCustomer(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->sendQuoteRequestToCompanyUser($quoteRequestFilterTransfer);
    }
}
