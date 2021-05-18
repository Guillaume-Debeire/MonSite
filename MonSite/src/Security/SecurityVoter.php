<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class UserVoter extends Voter
{
    // on utilise une constante de classe 
    //   - cela permet d'être sur que le nom du droit à tester est bien le meme partout
    const USER_READ = 'USER_READ';
    const USER_EDIT = 'USER_EDIT';
    const USER_DELETE = 'USER_DELETE';

    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['USER_READ', 'USER_EDIT', 'USER_DELETE'])
            && $subject instanceof \App\Entity\User;
    }

     /**
     * 
     * @param User $attribute le droit qui va être testé
     * @param User $subject l'entité sur laquelle l'utilisateur en session essaye d'agir
     * @param TokenInterface $token
     * @return void
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        /** @var User $user */
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }
        switch ($attribute) {
            case 'USER_READ':
                if (in_array('ROLE_ADMIN', $user->getRoles()))
                {
                    return true;
                }
                if ($user == $subject)
                {
                    return true;
                }
            case 'USER_EDIT':
                if (in_array('ROLE_ADMIN', $user->getRoles()))
                {
                    return true;
                }
                if ($user == $subject)
                {
                    return true;
                }
            case 'USER_DELETE':
                if (in_array('ROLE_ADMIN', $user->getRoles()))
                {
                    return true;
                }
                if ($user == $subject)
                {
                    return true;
                }
            break;
        }
        return false;
    }
}
 