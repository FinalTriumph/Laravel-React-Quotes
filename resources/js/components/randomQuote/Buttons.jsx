import React from 'react';
import Save from './Save.jsx';

export default function Buttons(props) {
    const {
        loading,
        save,
        onSaveClick,
        saveStatus,
        onNewClick,
    } = props;

    if (loading) {
        return (null);
    }

    return (
        <div className="grid grid-cols-2 mt-auto">
            <div className="flex items-end">
                <button
                    className="btn-action w-full"
                    onClick={onNewClick}
                >
                    New Quote
                </button>
            </div>
            <Save
                save={save}
                status={saveStatus}
                onClick={onSaveClick}
            />
        </div>
    );
}