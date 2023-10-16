<?php
    namespace App\View\Components;

    use  Illuminate\View\Component;

    class Alert extends Component
    {
        /**
         * @return void
         */

         public function __construct(public string $message)
         {
            //
         }

         /**
          * @return \Illuminate\Contracts\View\View|\Closure|string
          */
         public function render()
         {
            return view('components.alert');
         }
    }
?>
