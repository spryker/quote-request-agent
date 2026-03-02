<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\QuoteRequestAgent\Dependency\Facade;

use Generated\Shared\Transfer\QuoteRequestCollectionTransfer;
use Generated\Shared\Transfer\QuoteRequestFilterTransfer;
use Generated\Shared\Transfer\QuoteRequestResponseTransfer;
use Generated\Shared\Transfer\QuoteRequestTransfer;

class QuoteRequestAgentToQuoteRequestFacadeBridge implements QuoteRequestAgentToQuoteRequestFacadeInterface
{
    /**
     * @var \Spryker\Zed\QuoteRequest\Business\QuoteRequestFacadeInterface
     */
    protected $quoteRequestFacade;

    /**
     * @param \Spryker\Zed\QuoteRequest\Business\QuoteRequestFacadeInterface $quoteRequestFacade
     */
    public function __construct($quoteRequestFacade)
    {
        $this->quoteRequestFacade = $quoteRequestFacade;
    }

    public function createQuoteRequestForCompanyUser(QuoteRequestTransfer $quoteRequestTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->createQuoteRequestForCompanyUser($quoteRequestTransfer);
    }

    public function updateQuoteRequestForCompanyUser(QuoteRequestTransfer $quoteRequestTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->updateQuoteRequestForCompanyUser($quoteRequestTransfer);
    }

    public function cancelQuoteRequestForCompanyUser(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->cancelQuoteRequestForCompanyUser($quoteRequestFilterTransfer);
    }

    public function reviseQuoteRequestForCompanyUser(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->reviseQuoteRequestForCompanyUser($quoteRequestFilterTransfer);
    }

    public function sendQuoteRequestToCompanyUser(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->sendQuoteRequestToCompanyUser($quoteRequestFilterTransfer);
    }

    public function getQuoteRequestCollectionByFilter(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestCollectionTransfer
    {
        return $this->quoteRequestFacade->getQuoteRequestCollectionByFilter($quoteRequestFilterTransfer);
    }

    public function getQuoteRequest(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->quoteRequestFacade->getQuoteRequest($quoteRequestFilterTransfer);
    }
}
