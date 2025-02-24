import React from 'react';
import Source from './Source.jsx';

export default function Error({ error, source, sourceTitle }) {
    if (!error) {
        return (null);
    }

    return (
        <div className="mb-6">
            <Source source={source} title={sourceTitle} />
            <p className="text-red-500">{error}</p>
        </div>
    );
}