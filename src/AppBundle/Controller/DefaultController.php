<?php

namespace AppBundle\Controller;

use Pucene\Component\Analysis\AnalyzerRegistry;
use Pucene\Component\Analysis\StandardAnalyzer;
use Pucene\Component\Document\Document;
use Pucene\Component\Document\Field;
use Pucene\Component\Index;
use Pucene\Component\InvertedIndex\ArrayStorage;
use Pucene\Component\InvertedIndex\InvertedIndex;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $index = $this->getIndex('test');

        $index->index(new Document(['title' => new Field('Die tolle Farbkombination macht diesen Salat zum absoluten Augenschmaus')]));
        $index->index(new Document(['title' => new Field('Das könnten die neuen Lieblingsbrownies werden: optisch ein Hingucker und geschmacklich eine Wucht')]));
        $index->index(new Document(['title' => new Field('Auch die Anhänger der mediterranen Küche sollen in der Kürbiszeit zu ihrem Recht kommen. Hier ein Rezept für eine Tomaten-Kürbis-Suppe')]));

        dump($index->search('D'));

        // replace this example code with whatever you need
        return $this->render(
            'default/index.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
            ]
        );
    }

    private function getIndex($name)
    {
        $analyzerRegistry = new AnalyzerRegistry(['standard' => new StandardAnalyzer()]);
        $invertedIndex = new InvertedIndex(new ArrayStorage());

        return new Index($name, $analyzerRegistry, $invertedIndex);
    }
}
