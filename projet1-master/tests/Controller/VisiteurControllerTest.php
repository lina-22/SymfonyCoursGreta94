<?php

namespace App\Test\Controller;

use App\Entity\Visiteur;
use App\Repository\VisiteurRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VisiteurControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private VisiteurRepository $repository;
    private string $path = '/visiteur/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Visiteur::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Visiteur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'visiteur[nom]' => 'Testing',
            'visiteur[prenom]' => 'Testing',
            'visiteur[adresse]' => 'Testing',
            'visiteur[cp]' => 'Testing',
            'visiteur[ville]' => 'Testing',
            'visiteur[tel]' => 'Testing',
            'visiteur[regions]' => 'Testing',
        ]);

        self::assertResponseRedirects('/visiteur/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Visiteur();
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCp('My Title');
        $fixture->setVille('My Title');
        $fixture->setTel('My Title');
        $fixture->setRegions('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Visiteur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Visiteur();
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCp('My Title');
        $fixture->setVille('My Title');
        $fixture->setTel('My Title');
        $fixture->setRegions('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'visiteur[nom]' => 'Something New',
            'visiteur[prenom]' => 'Something New',
            'visiteur[adresse]' => 'Something New',
            'visiteur[cp]' => 'Something New',
            'visiteur[ville]' => 'Something New',
            'visiteur[tel]' => 'Something New',
            'visiteur[regions]' => 'Something New',
        ]);

        self::assertResponseRedirects('/visiteur/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getCp());
        self::assertSame('Something New', $fixture[0]->getVille());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getRegions());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Visiteur();
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCp('My Title');
        $fixture->setVille('My Title');
        $fixture->setTel('My Title');
        $fixture->setRegions('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/visiteur/');
    }
}
