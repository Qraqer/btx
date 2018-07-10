<? namespace BH;

class BitrixHelper 
{
    /**
     * BitrixHelper constructor.
     */
    public static function init()
    {
        require_once 'classes/CIBlockPropertyCheckbox.php';

        require_once 'classes/Frontend/Frontend.php';
        \BH\Frontend::init();

        require_once 'classes/Model/IbAbstract.php';
        require_once 'classes/Model/SectionAbstract.php';
        require_once 'classes/Model/ModelAbstract.php';
    }
}