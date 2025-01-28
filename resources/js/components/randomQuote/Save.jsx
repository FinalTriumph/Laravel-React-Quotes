
import React from 'react';

export default function Save({ save, status, onClick}) {
    if (!save) {
        return (null);
    }

    if (!status) {
        return (
            <button
                className="btn-action"
                onClick={onClick}
            >
                Save
            </button>
        )
    }

    if (status === 'error') {
        return (
            <div>
                <p className="text-red-500">Error occurred while saving quote</p>
                <button
                    className="btn-action w-full"
                    onClick={onClick}
                >
                    Save
                </button>
            </div>
        )
    }

    if (status === 'saving') {
        return (
            <div className="flex items-center justify-center">
                <p>Saving ...</p>
            </div>
        )
    }

    return (
        <div className="flex items-center justify-center">
            <p className="font-bold">Quote saved!</p>
        </div>
    )
}