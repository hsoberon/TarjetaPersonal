<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class RenameContactLinkType extends AbstractMigration
{
    public function up(): void
    {
        $this->execute(
            "UPDATE link_types SET title = 'Generar contacto', description = 'Genera un archivo .vcf con el nombre, el cargo, la foto y los demás enlaces' WHERE id = 4"
        );
    }

    public function down(): void
    {
        $this->execute(
            "UPDATE link_types SET title = 'Guardar contacto', description = 'Permite guardar esta tarjeta en tu lista de contactos' WHERE id = 4"
        );
    }
}
