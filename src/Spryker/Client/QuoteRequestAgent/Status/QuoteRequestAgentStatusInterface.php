<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\QuoteRequestAgent\Status;

use Generated\Shared\Transfer\QuoteRequestTransfer;

interface QuoteRequestAgentStatusInterface
{
    public function isQuoteRequestCancelable(QuoteRequestTransfer $quoteRequestTransfer): bool;

    public function isQuoteRequestRevisable(QuoteRequestTransfer $quoteRequestTransfer): bool;

    public function isQuoteRequestEditable(QuoteRequestTransfer $quoteRequestTransfer): bool;
}
