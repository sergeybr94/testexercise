<?
namespace SB\Cars\Console;


use Notamedia\ConsoleJedi\Application\Command\BitrixCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use SB\Cars\Model\Car;


class Command extends BitrixCommand
{
    protected function configure()
    {
        $this->setName('mileage:down')
            ->setDescription('Car\'s mileage down')
            ->addOption('percent', 'p', InputOption::VALUE_REQUIRED, 'Percent');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $percet = (int)$input->getOption('percent');


        if($percet >= 1){
            $output->writeln("<info>Percent: $percet</info>");

            $cars = Car::getList();

            foreach ($cars as $car){
                $mileage = $car[Car::mileagePropCode];
                $car[Car::mileagePropCode] -=  $car[Car::mileagePropCode]/100*$percet;
                $mileageNew = $car[Car::mileagePropCode];

                if(Car::update($car['ID'], $car)){
                    $output->writeln("<info>CAR[$car[ID]]: $mileage -> $mileageNew</info>");
                }else{
                    $output->writeln("<error>CAR[$car[ID]]: $mileage -> $mileageNew</error>");
                }
            }
        }else{
            $output->writeln("<error>Percent is not integer</error>");
        }
    }
}
