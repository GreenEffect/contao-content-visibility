<?php

declare(strict_types=1);

namespace Greeneffect\ContaoContentVisibility\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;

/**
 * Ajoute les colonnes hide_content et hide_from_groups à tl_content
 * si elles n'existent pas encore.
 */
class AddContentVisibilityColumnsMigration extends AbstractMigration
{
    public function __construct(private readonly Connection $connection)
    {
    }

    public function getName(): string
    {
        return 'ContentVisibility: Add hide_content and hide_from_groups to tl_content';
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();
        $columns = $schemaManager->listTableColumns('tl_content');
        $columnNames = array_keys($columns);

        return !\in_array('hide_content', $columnNames, true)
            || !\in_array('hide_from_groups', $columnNames, true);
    }

    public function run(): MigrationResult
    {
        $schemaManager = $this->connection->createSchemaManager();
        $columns = $schemaManager->listTableColumns('tl_content');
        $columnNames = array_keys($columns);

        if (!\in_array('hide_content', $columnNames, true)) {
            $this->connection->executeStatement(
                "ALTER TABLE tl_content ADD COLUMN hide_content char(1) NOT NULL default ''"
            );
        }

        if (!\in_array('hide_from_groups', $columnNames, true)) {
            $this->connection->executeStatement(
                'ALTER TABLE tl_content ADD COLUMN hide_from_groups blob NULL'
            );
        }

        return $this->createResult(true, 'Colonnes hide_content et hide_from_groups ajoutées à tl_content.');
    }
}
