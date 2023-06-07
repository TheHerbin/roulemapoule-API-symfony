<?php

namespace App\Controller;

use App\Entity\Authentification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => "Index de l'api & gestion de l'utilisateur. Essayez de faire un appel sur la fonction creerUtilisateur en méthode POST",
            'path' => 'src/Controller/UtilisateurController.php',
        ]);
    }

    /**
     * @Route("/creer_utilisateur", name="creer_utilisateur")
     * */
    public function creerUtilisateur(Request $request, EntityManagerInterface $entityManager)
    {

        $res = $request->request->all();
        $user = new Utilisateur();
        $user->setNom($res['nom']);
        $user->setPrenom($res['prenom']);


        $auth = new Authentification();
        $auth->setEmail($res['email']);
        $auth->setMdp($this->hashLePassword($res['mdp']));
        //dump($auth);

        $entityManager->persist($user);
        $entityManager->flush();
        $idUser = $user->getId();
        if ($idUser) {
            $auth->setIdUtilisateur($user);
            $entityManager->persist($auth);

            $idAuth = $auth->getid();
            $user->setIdAuthentification($auth);

            $entityManager->persist($user);
            $entityManager->flush();
        } else {
            return $this->json([
                'success' => "false"
            ]);
        }

        return $this->json([
            'success' => "true"
        ]);
    }

    public function hashLePassword($password)
    {
        $password = hash('md5', $password);
        return $password;
    }


    /**
     * @Route("/getAllUtilisateurs")
     */
    public function getAllUtilisateurs(EntityManagerInterface $entityManager): Response
    {

        $repository = $entityManager->getRepository(Utilisateur::class);
        $users = $repository
            ->createQueryBuilder('u')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            
        
        if (empty($users)) {
            throw $this->createNotFoundException(
                "Aucun utilisateur n'a été trouvé "
            );
        } else {
            
            
            return new JsonResponse(
                [
                    'utilisateurs' => $users,
                ],
                Response::HTTP_OK
            );

        }

    }
}