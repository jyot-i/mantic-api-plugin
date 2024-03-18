// MySubscriberApiBundle/Migrations/Version20230412123456.php

namespace MauticPlugin\MySubscriberApiBundle\Migrations;

<?php
use Doctrine\DBAL\Schema\Schema;
use Mautic\CoreBundle\Doctrine\AbstractMauticMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20240412123456 extends AbstractMauticMigration
{
    /**
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\Exception
     */
    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE IF NOT EXISTS `subscribers` (
            `id` INT AUTO_INCREMENT NOT NULL, 
            `username` VARCHAR(255) NOT NULL, 
            `expire_date` DATETIME NOT NULL, 
            `status` TINYINT(1) NOT NULL, 
            PRIMARY KEY(`id`)
        ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ENGINE = InnoDB");
    }

    /**
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\Exception
     */
    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE IF EXISTS `subscribers`");
    }
}