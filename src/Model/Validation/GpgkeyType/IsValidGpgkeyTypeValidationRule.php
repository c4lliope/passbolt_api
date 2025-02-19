<?php
declare(strict_types=1);

/**
 * Passbolt ~ Open source password manager for teams
 * Copyright (c) Passbolt SA (https://www.passbolt.com)
 *
 * Licensed under GNU Affero General Public License version 3 of the or any later version.
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Passbolt SA (https://www.passbolt.com)
 * @license       https://opensource.org/licenses/AGPL-3.0 AGPL License
 * @link          https://www.passbolt.com Passbolt(tm)
 * @since         3.6.0
 */

namespace App\Model\Validation\GpgkeyType;

use App\Model\Validation\PassboltValidationRule;
use App\Service\OpenPGP\PublicKeyValidationService;

class IsValidGpgkeyTypeValidationRule extends PassboltValidationRule
{
    /**
     * @inheritDoc
     */
    public function defaultErrorMessage($value, $context): string
    {
        return __('The type should be one of the following: RSA, DSA, ECC, ELGAMAL, ECDSA, DH.');
    }

    /**
     * @inheritDoc
     */
    public function rule($value, $context): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return PublicKeyValidationService::isValidAlgorithm($value);
    }
}
