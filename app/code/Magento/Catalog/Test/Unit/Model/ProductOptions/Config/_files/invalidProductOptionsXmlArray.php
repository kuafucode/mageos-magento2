<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

return [
    'options_node_is_required' => [
        '<?xml version="1.0"?><config><inputType name="name_one" /></config>',
        [
            "Element 'inputType': This element is not expected. Expected is ( option ).\nLine: 1\n" .
            "The xml was: \n0:<?xml version=\"1.0\"?>\n1:<config><inputType name=\"name_one\"/></config>\n2:\n"
        ],
    ],
    'inputType_node_is_required' => [
        '<?xml version="1.0"?><config><option name="name_one"/></config>',
        [
            "Element 'option': Missing child element(s). Expected is ( inputType ).\nLine: 1\n" .
            "The xml was: \n0:<?xml version=\"1.0\"?>\n1:<config><option name=\"name_one\"/></config>\n2:\n"
        ],
    ],
    'options_name_must_be_unique' => [
        '<?xml version="1.0"?><config><option name="name_one"><inputType name="name"/>' .
        '</option><option name="name_one"><inputType name="name_two"/></option></config>',
        [
            "Element 'option': Duplicate key-sequence ['name_one'] in unique identity-constraint " .
            "'uniqueOptionName'.\nLine: 1\nThe xml was: \n0:<?xml version=\"1.0\"?>\n1:<config><option " .
            "name=\"name_one\"><inputType name=\"name\"/></option><option name=\"name_one\"><inputType " .
            "name=\"name_two\"/></option></config>\n2:\n"
        ],
    ],
    'inputType_name_must_be_unique' => [
        '<?xml version="1.0"?><config><option name="name"><inputType name="name_one"/>' .
        '<inputType name="name_one"/></option></config>',
        [
            "Element 'inputType': Duplicate key-sequence ['name_one'] in unique identity-constraint " .
            "'uniqueInputTypeName'.\nLine: 1\nThe xml was: \n0:<?xml version=\"1.0\"?>\n" .
            "1:<config><option name=\"name\"><inputType name=\"name_one\"/><inputType name=\"name_one\"/>" .
            "</option></config>\n2:\n"
        ],
    ],
    'renderer_attribute_with_invalid_value' => [
        '<?xml version="1.0"?><config><option name="name_one" renderer="123true"><inputType name="name_one"/>' .
        '</option></config>',
        [
            "Element 'option', attribute 'renderer': [facet 'pattern'] The value '123true' is not accepted " .
            "by the pattern '([\\\]?[a-zA-Z_][a-zA-Z0-9_]*)+'.\n" .
            "Line: 1\nThe xml was: \n0:<?xml version=\"1.0\"?>\n1:<config><option name=\"name_one\" " .
            "renderer=\"123true\"><inputType name=\"name_one\"/></option></config>\n2:\n"
        ],
    ],
    'disabled_attribute_with_invalid_value' => [
        '<?xml version="1.0"?><config><option name="name_one"><inputType name="name_one" disabled="7"/>' .
        '<inputType name="name_two" disabled="some_string"/></option></config>',
        [
            "Element 'inputType', attribute 'disabled': '7' is not a valid value of the atomic type 'xs:boolean'.\n" .
            "Line: 1\nThe xml was: \n0:<?xml version=\"1.0\"?>\n1:<config><option name=\"name_one\">" .
            "<inputType name=\"name_one\" disabled=\"7\"/><inputType name=\"name_two\" disabled=\"some_string\"/>" .
            "</option></config>\n2:\n",
            "Element 'inputType', attribute 'disabled': 'some_string' is not a valid value of the atomic type " .
            "'xs:boolean'.\nLine: 1\nThe xml was: \n0:<?xml version=\"1.0\"?>\n1:<config><option name=\"name_one\">" .
            "<inputType name=\"name_one\" disabled=\"7\"/><inputType name=\"name_two\" disabled=\"some_string\"/>" .
            "</option></config>\n2:\n"
        ],
    ]
];
