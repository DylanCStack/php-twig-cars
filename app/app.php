<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();
    $app["debug"] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
));

    $app->get("/", function() use ($app) {
      return $app['twig']->render('input-form.html.twig');
    });

 // adfdasfds

    $app->get("/Car", function() use($app) {
          $porsche = new Car("2014 Porsche 911", 114991, 7864);
          $ford = new Car("2011 Ford F450", 55995, 14241);
          $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
          $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);
          $mazda = new Car("2016 Mazda 6", 25000, 50000);

          $cars = array($ford, $lexus, $mercedes, $mazda, $porsche);
          $cars_matching_search = array();

          foreach ($cars as $car) {
                  if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
                        array_push($cars_matching_search, $car);
                  }
            }

        return $app['twig']->render('Car.html.twig', array("cars" => $cars_matching_search));
    });

    return $app;
?>
