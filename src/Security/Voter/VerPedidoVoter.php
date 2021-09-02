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
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if ($user->getId() == $pedido->getCliente()->getUsuarioId()) {
            return true;
        }
 
       

        return false;
    }
}
