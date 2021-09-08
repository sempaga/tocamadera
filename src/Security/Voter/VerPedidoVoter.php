<?php

namespace App\Security\Voter;

use App\Entity\Pedido;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class VerPedidoVoter extends Voter
{
    protected function supports(string $attribute, $subject): bool
    {
        if ($subject instanceof Pedido && $attribute == 'show') {
        return true;
        }
        return false;
    }

    protected function voteOnAttribute(string $attribute, $pedido, TokenInterface $token): bool
    {
        /** @var \App\Entity\User */
        $user = $token->getUser();
        if("ROLE_ADMIN"===$user->getRol()){
            return true;
        }
        if ($user->getId() == $pedido->getCliente()->getUsuario()->getId()) {
            return true;
        }
 
       

        return false;
    }
}
