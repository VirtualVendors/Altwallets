<?php namespace Virtualvendors\Altwallets\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Virtualvendors\Altwallets\User;
use Illuminate\Database\Eloquent\Model as Eloquent;

class InstallCommand extends Command {

  /**
   * The Package Name
   * @var string
   */
  protected $package = 'virtualvendors/altwallets';

  /**
   * The console command name.
   * @var string
   */
  protected $name = 'altwallets:install';

  /**
   * The console command description.
   * @var string
   */
  protected $description = 'Run the initial Altwallets Installation';

  /**
   * Execute the console command.
   * @return mixed
   */
  public function fire()
  {
    if(app('config')->get('app.key') == 'YourSecretKey!!!')
    {
      $this->info('Updating your application key.');
      $this->call('key:generate');
    }

    $this->info('Publishing Configuration');
    $this->call('config:publish', ['package' => $this->package]);

    $this->info('Publishing Migrations');
    $this->call('migrate:publish', ['package' => $this->package]);

    $this->info('Publishing Assets');
    $this->call('asset:publish', ['package' => $this->package]);

    $this->info('Migrating Database');
    $this->call('migrate');

    $this->info('Creating Super User');

    $email = $this->ask('Email?');
    $password = $this->secret('Password?');

    Eloquent::unguard();

    $user = User::create([
      'email'    => $email,
      'password' => $password,
      'super'    => true,
      'active'   => true,
    ]);

    $this->info('User [' . $user->id . '] created!');
  }
}
