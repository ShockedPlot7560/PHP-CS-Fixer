==========================================
Rule ``single_trait_insert_per_statement``
==========================================

Each trait ``use`` must be done as single statement.

Examples
--------

Example #1
~~~~~~~~~~

.. code-block:: diff

   --- Original
   +++ New
    <?php
    final class Example
    {
   -    use Foo, Bar;
   +    use Foo;use Bar;
    }

Rule sets
---------

The rule is part of the following rule sets:

@PER
  Using the `@PER <./../../ruleSets/PER.rst>`_ rule set will enable the ``single_trait_insert_per_statement`` rule.

@PER-CS1.0
  Using the `@PER-CS1.0 <./../../ruleSets/PER-CS1.0.rst>`_ rule set will enable the ``single_trait_insert_per_statement`` rule.

@PSR12
  Using the `@PSR12 <./../../ruleSets/PSR12.rst>`_ rule set will enable the ``single_trait_insert_per_statement`` rule.

@PhpCsFixer
  Using the `@PhpCsFixer <./../../ruleSets/PhpCsFixer.rst>`_ rule set will enable the ``single_trait_insert_per_statement`` rule.

@Symfony
  Using the `@Symfony <./../../ruleSets/Symfony.rst>`_ rule set will enable the ``single_trait_insert_per_statement`` rule.
