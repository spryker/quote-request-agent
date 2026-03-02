<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\QuoteRequestAgent\Communication\Controller;

use Generated\Shared\Transfer\QuoteRequestFilterTransfer;
use Generated\Shared\Transfer\QuoteRequestOverviewCollectionTransfer;
use Generated\Shared\Transfer\QuoteRequestOverviewFilterTransfer;
use Generated\Shared\Transfer\QuoteRequestResponseTransfer;
use Generated\Shared\Transfer\QuoteRequestTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Spryker\Zed\QuoteRequestAgent\Business\QuoteRequestAgentFacadeInterface getFacade()
 * @method \Spryker\Zed\QuoteRequestAgent\Communication\QuoteRequestAgentCommunicationFactory getFactory()
 */
class GatewayController extends AbstractGatewayController
{
    public function createQuoteRequestAction(QuoteRequestTransfer $quoteRequestTransfer): QuoteRequestResponseTransfer
    {
        return $this->getFacade()->createQuoteRequest($quoteRequestTransfer);
    }

    public function updateQuoteRequestAction(QuoteRequestTransfer $quoteRequestTransfer): QuoteRequestResponseTransfer
    {
        return $this->getFacade()->updateQuoteRequest($quoteRequestTransfer);
    }

    public function cancelQuoteRequestAction(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->getFacade()->cancelQuoteRequest($quoteRequestFilterTransfer);
    }

    public function sendQuoteRequestToCustomerAction(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->getFacade()->sendQuoteRequestToCustomer($quoteRequestFilterTransfer);
    }

    public function reviseQuoteRequestAction(QuoteRequestFilterTransfer $quoteRequestFilterTransfer): QuoteRequestResponseTransfer
    {
        return $this->getFacade()->reviseQuoteRequest($quoteRequestFilterTransfer);
    }

    public function getQuoteRequestOverviewCollectionAction(
        QuoteRequestOverviewFilterTransfer $quoteRequestOverviewFilterTransfer
    ): QuoteRequestOverviewCollectionTransfer {
        return $this->getFacade()->getQuoteRequestOverviewCollection($quoteRequestOverviewFilterTransfer);
    }
}
