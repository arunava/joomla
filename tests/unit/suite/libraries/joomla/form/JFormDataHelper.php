<?php

class JFormDataHelper
{
	public static $bindDocument = '<form>
	<fields
		description="All the fields">
		<!-- Set up a group of fields called details. -->
		<field
			name="title" />
		<fields
			name="details"
			description="The Details Group">
			<field
				name="abstract" />
		</fields>
		<fields
			name="params"
			description="Optional Settings">
			<field
				name="show_title" />
			<field
				name="show_abstract" />
			<fieldset
				name="basic">
				<field
					name="show_author" />
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $filterDocument = '<form>
	<fields
		description="All the fields">
		<!-- Set up a group of fields called details. -->
		<field
			name="title" filter="word" />
		<fields
			name="details"
			description="The Details Group">
			<field
				name="abstract" />
		</fields>
		<fields
			name="params"
			description="Optional Settings">
			<field
				name="show_title" filter="int" />
			<field
				name="show_abstract" filter="int" />
			<fieldset
				name="basic">
				<field
					name="show_author" filter="int" />
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $findFieldDocument = '<form>
	<fields>
		<field
			name="title" type="text" place="root" />
		<fieldset>
			<field
				name="alias" type="text" />
		</fieldset>
		<fields
			name="params">
			<field
				name="title" place="child" type="password" />
			<fieldset
				label="Basic">
				<field
					name="show_title" />
			</fieldset>
			<fieldset
				label="Advanced">
				<field
					name="caching" />
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $findFieldsByFieldsetDocument = '<form>
	<fields>
		<!-- Set up a group of fields called details. -->
		<fields
			name="details">
			<field
				name="title" />
			<field
				name="abstract" />
		</fields>
		<fields
			name="params">
			<field
				name="outlier" />
			<fieldset
				name="params-basic">
				<field
					name="show_title" />
				<field
					name="show_abstract" />
				<field
					name="show_author" />
			</fieldset>
			<fieldset
				name="params-advanced">
				<field
					name="module_prefix" />
				<field
					name="caching" />
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $findFieldsByGroupDocument = '<form>
	<fields>
		<!-- Set up a group of fields called details. -->
		<fields
			name="details">
			<field
				name="title" />
			<field
				name="abstract" />
		</fields>
		<fields
			name="params">
			<field
				name="show_title" />
			<field
				name="show_abstract" />
			<fieldset
				name="basic">
				<field
					name="show_author" />
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $findGroupDocument = '<form>
	<fields>
		<field
			name="title" type="text" place="root" />
		<fieldset>
			<field
				name="alias" type="text" />
		</fieldset>
		<fields
			name="params">
			<field
				name="title" place="child" type="password" />
			<fieldset
				label="Basic">
				<field
					name="show_title" />
			</fieldset>
			<fieldset
				label="Advanced">
				<fields
					name="cache">
					<field
						name="enabled" />
					<field
						name="lifetime" />
				</fields>
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $getFieldDocument = '<form>
	<fields>
		<field
			name="title"
			type="text" />
		<fields
			name="params">
			<field
				name="show_title"
				type="text"
				default="1" />
		</fields>
	</fields>
</form>';

	public static $getFieldsetDocument = '<form>
	<fields>
		<!-- Set up a group of fields called details. -->
		<fields
			name="details">
			<field
				name="title" fieldset="params-basic" />
			<field
				name="abstract" />
		</fields>
		<fields
			name="params">
			<field
				name="outlier" />
			<fieldset
				name="params-basic">
				<field
					name="show_title" />
				<field
					name="show_abstract" />
				<field
					name="show_author" />
			</fieldset>
			<fieldset
				name="params-advanced">
				<field
					name="module_prefix" />
				<field
					name="caching" />
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $getFieldsetsDocument = '<form>
	<fields>
		<!-- Set up a group of fields called details. -->
		<fields
			name="details">
			<field
				name="title" fieldset="params-legacy" />
			<field
				name="abstract" />
		</fields>
		<fields
			name="params">
			<field
				name="outlier" fieldset="params-legacy" />
			<fieldset
				name="params-basic">
				<field
					name="show_title" />
				<field
					name="show_abstract" />
				<field
					name="show_author" />
			</fieldset>
			<fieldset
				name="params-advanced">
				<field
					name="module_prefix" />
				<field
					name="caching" />
			</fieldset>
		</fields>
	</fields>
</form>';

	public static $loadDocument = '<form>
	<fields>
		<field
			name="title" />

		<field
			name="abstract" />

		<fields
			name="params">
			<field
				name="show_title"
				type="radio">
				<option value="1">JYes</option>
				<option value="0">JNo</option>
			</field>
		</fields>
	</fields>
</form>';

	public static $loadMergeDocument = '<form>
	<fields>
		<field
			name="published"
			type="list">
			<option
				value="1">JYes</option>
			<option
				value="0">JNo</option>
		</field>

		<field
			name="abstract"
			label="Abstract" />

		<fields
			label="A general group">
			<field
				name="access" />
			<field
				name="ordering" />
		</fields>

		<fields
			name="params">
			<field
				name="show_abstract"
				type="radio">
				<option value="1">JYes</option>
				<option value="0">JNo</option>
			</field>
		</fields>

		<fieldset>
			<field
				name="language"
				type="text"/>
		</fieldset>
	</fields>
</form>';

	public static $loadXPathDocument = '<extension>
	<fields>
		<!-- Set up a group of fields called details. -->
		<fields
			name="details">
			<field
				name="title" />
			<field
				name="abstract" />
		</fields>
		<fields
			name="params">
			<field
				name="outlier" />
			<fieldset
				name="params-basic">
				<field
					name="show_title" />
				<field
					name="show_abstract" />
				<field
					name="show_author" />
			</fieldset>
			<fieldset
				name="params-advanced">
				<field
					name="module_prefix" />
				<field
					name="caching" />
			</fieldset>
		</fields>
	</fields>
</extension>';
}