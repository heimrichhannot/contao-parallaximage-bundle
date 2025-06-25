<?php

namespace HeimrichHannot\ContaoParallaxImageBundle\EventListener;

use Contao\BackendUser;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\CoreBundle\Image\ImageSizes;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[AsCallback(table: 'tl_article', target: 'fields.parallaxImageSize.options')]
class ArticleFieldsOptionsListener
{
    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly ImageSizes $imageSizes,
    ) {
    }

    public function __invoke(): array
    {
        $user = $this->tokenStorage->getToken()?->getUser();

        if (!$user instanceof BackendUser) {
            return [];
        }

        return $this->imageSizes->getOptionsForUser($user);
    }
}